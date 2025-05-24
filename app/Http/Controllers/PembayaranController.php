<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Http\Requests\StorePembayaranRequest;
use App\Http\Requests\UpdatePembayaranRequest;
use App\Mail\SerialNumberCreated;
use App\Models\PembayaranDuitku;
use App\Models\SerialNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PembayaranController extends Controller
{
    private $merchantCode;
    private $apiKey;
    private $callbackUrl;
    private $returnUrl;
    private $sandboxMode;

    public function __construct()
    {
        $this->merchantCode = config('duitku.merchant_code');
        $this->apiKey = config('duitku.api_key');
        $this->callbackUrl = config('duitku.callback_url');
        $this->returnUrl = config('duitku.return_url');
        $this->sandboxMode = config('duitku.sandbox_mode');
    }

    /**
     * Handle Duitku callback
     */
    public function callbackHandler(Request $request)
    {
        Log::info('Duitku Callback Received:', $request->all());

        try {
            $callbackData = $request->all();
            $merchantOrderId = $callbackData['merchantOrderId'];

            // Verifikasi signature
            $merchantCode = $callbackData['merchantCode'];
            $amount = $callbackData['amount'];
            $signature = $callbackData['signature'];

            $stringToHash = $merchantCode . $amount . $merchantOrderId . $this->apiKey;
            $expectedSignature = md5($stringToHash);

            if ($signature !== $expectedSignature) {
                throw new \Exception('Invalid callback signature');
            }

            // Cari transaksi dengan lock untuk prevent race condition
            $pembayaran = Pembayaran::with(['produk', 'duitkuPayment'])
                ->where('merchant_order_id', $merchantOrderId)
                ->lockForUpdate()
                ->first();

            if (!$pembayaran) {
                Log::error('Transaction not found', ['merchantOrderId' => $merchantOrderId]);
                throw new \Exception("Merchant order ID {$merchantOrderId} not found");
            }

            $status = $this->mapDuitkuStatus($callbackData['resultCode']);

            DB::transaction(function () use ($pembayaran, $callbackData, $status) {
                // Update status pembayaran
                $pembayaran->update(['status' => $status]);

                $pembayaran->duitkuPayment->update([
                    'callback_response' => json_encode($callbackData),
                    'status' => $this->getStatusText($status),
                    'payment_method' => $callbackData['paymentMethod'] ?? null
                ]);

                // Jika pembayaran sukses, generate serial number
                if ($status == 1) {
                    $this->generateAndSendSerialNumber($pembayaran);
                }
            });

            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            Log::error('Callback Error: ' . $e->getMessage(), [
                'exception' => $e,
                'request' => $request->all()
            ]);
            return response()->json(['success' => false, 'message' => $e->getMessage()], 400);
        }
    }

    /**
     * Create new payment
     */
    public function createPayment(Request $request)
    {
        DB::beginTransaction();

        try {
            $validated = $this->validatePaymentRequest($request);

            // Generate Merchant Order ID
            $merchantOrderId = Str::uuid()->toString();

            // 1. Simpan ke pembayaran_duitku terlebih dahulu
            $duitkuPayment = PembayaranDuitku::create([
                'merchant_order_id' => $merchantOrderId,
                'status' => 'pending'
            ]);

            // 2. Simpan ke tabel pembayaran
            $pembayaran = Pembayaran::create([
                'produk_id' => $validated['produk_id'],
                'merchant_order_id' => $merchantOrderId,
                'nominal' => $validated['amount'],
                'customer_email' => $validated['email'],
                'customer_name' => $validated['customer_name'],
                'customer_phone' => $validated['phone_number'],
                'status' => 0 // pending
            ]);

            // Commit transaction sebelum call API Duitku
            DB::commit();

            // 3. Panggil API Duitku
            $duitkuResponse = $this->createDuitkuInvoice($pembayaran);

            if ($duitkuResponse['statusCode'] != '00') {
                throw new \Exception($duitkuResponse['statusMessage'] ?? 'Failed to create Duitku invoice');
            }

            // Update reference tanpa transaction
            $duitkuPayment->update([
                'reference' => $duitkuResponse['reference'],
                'payment_method' => $duitkuResponse['paymentMethod'] ?? null,
                'transaction_response' => $duitkuResponse
            ]);

            return response()->json([
                'success' => true,
                'payment_url' => $duitkuResponse['paymentUrl'],
                'reference' => $duitkuResponse['reference'],
                'merchant_order_id' => $merchantOrderId
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Payment Error: ' . $e->getMessage(), [
                'request' => $request->all(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => env('APP_DEBUG') ? $e->getMessage() : 'Payment processing failed'
            ], 500);
        }
    }

    /**
     * Generate and send serial number
     */
    private function generateAndSendSerialNumber(Pembayaran $pembayaran)
    {
        try {
            // Generate unique serial number
            do {
                $serialNumber = 'SN' . strtoupper(bin2hex(random_bytes(5)));
            } while (SerialNumber::where('serialNumber', $serialNumber)->exists());

            // Generate random password
            $plainPassword = substr(md5(uniqid()), 0, 8);
            $hashedPassword = Hash::make($plainPassword);

            // Create serial number record
            $serial = SerialNumber::create([
                'serialNumber' => $serialNumber,
                'password' => $hashedPassword,
                'name' => $pembayaran->customer_name,
                'email' => $pembayaran->customer_email,
                'phoneNumber' => $pembayaran->customer_phone,
                'profileImage' => "/storage/profile_images/default.png",
                'is_active' => 1,
            ]);

            $productImage = $pembayaran->produk->image_logo;


            // Send email
            Mail::to($pembayaran->customer_email)
                ->send(new SerialNumberCreated(
                    $serialNumber,
                    $plainPassword,
                    $pembayaran->produk->name,
                    $productImage,
                    $pembayaran->produk->imagebg_produk,
                    $pembayaran->produk->link_aplikasi,
                    $pembayaran->produk->link_tutorial,
                ));

            Log::info('Serial number generated and sent', [
                'email' => $pembayaran->customer_email,
                'serial_number' => $serialNumber
            ]);

        } catch (\Exception $e) {
            Log::error('Failed to generate serial number: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Validate payment request
     */
    private function validatePaymentRequest(Request $request)
    {
        return $request->validate([
            'produk_id' => 'required|exists:produk,id',
            'amount' => 'required|numeric|min:1000|max:100000000',
            'email' => 'required|email|max:255',
            'customer_name' => 'required|string|max:100|regex:/^[a-zA-Z\s\'.-]+$/u',
            'phone_number' => 'required|string|max:20|regex:/^[0-9+\-\s]+$/'
        ]);
    }

    /**
     * Create Duitku invoice
     */
    private function createDuitkuInvoice(Pembayaran $pembayaran)
    {
        $timestamp = round(microtime(true) * 1000);
        $signature = hash('sha256', $this->merchantCode . $timestamp . $this->apiKey);

        $payload = [
            'paymentAmount' => $pembayaran->nominal,
            'merchantOrderId' => $pembayaran->merchant_order_id,
            'productDetails' => 'Pembayaran untuk ' . $pembayaran->produk->name,
            'email' => $pembayaran->customer_email,
            'phoneNumber' => $pembayaran->customer_phone,
            'customerVaName' => $pembayaran->customer_name,
            'callbackUrl' => $this->callbackUrl,
            'returnUrl' => $this->returnUrl,
            'expiryPeriod' => 1440, // 24 jam
            'itemDetails' => [
                [
                    'name' => $pembayaran->produk->name,
                    'price' => $pembayaran->nominal,
                    'quantity' => 1
                ]
            ]
        ];

        $endpoint = $this->sandboxMode
            ? 'https://api-sandbox.duitku.com/api/merchant/createInvoice'
            : 'https://api-prod.duitku.com/api/merchant/createInvoice';

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'x-duitku-signature' => $signature,
                'x-duitku-timestamp' => $timestamp,
                'x-duitku-merchantcode' => $this->merchantCode,
            ])
            ->timeout(30)
            ->retry(3, 1000)
            ->post($endpoint, $payload);

            if ($response->failed()) {
                throw new \Exception('Duitku API Error: ' . $response->body());
            }

            return $response->json();

        } catch (\Exception $e) {
            Log::error('Duitku Connection Error: ' . $e->getMessage());
            throw new \Exception('Failed to connect to payment gateway');
        }
    }

    /**
     * Map Duitku status code to our system
     */
    private function mapDuitkuStatus($resultCode)
    {
        return match ($resultCode) {
            '00' => 1, // Success
            '01' => 2, // Failed
            default => 0 // Pending
        };
    }

    /**
     * Get status text
     */
    private function getStatusText($statusCode)
    {
        return match ($statusCode) {
            1 => 'success',
            2 => 'failed',
            default => 'pending'
        };
    }

    /**
     * Payment return page
     */
public function paymentReturn(Request $request)
{
    $merchantOrderId = $request->input('merchantOrderId');
    
    try {
        $payment = Pembayaran::with(['produk', 'duitkuPayment'])
            ->where('merchant_order_id', $merchantOrderId)
            ->firstOrFail();

        $isSuccess = $payment->status == 1;
        $paymentMethod = $payment->duitkuPayment->payment_method ?? null;
        $status = $payment->status;

        // Jika sukses, cek apakah sudah punya serial number
        $hasSerialNumber = false;
        if ($isSuccess) {
            $hasSerialNumber = SerialNumber::where('email', $payment->customer_email)
                ->whereNotNull('serialNumber')
                ->exists();
        }

        return view('page.done', [
            'isSuccess' => $isSuccess,
            'payment' => $payment,
            'paymentMethod' => $paymentMethod,
            'status' => $status,
            'hasSerialNumber' => $hasSerialNumber
        ]);

    } catch (\Exception $e) {
        Log::error('Payment return error: ' . $e->getMessage());
        return redirect('/')->with('error', 'Transaksi tidak ditemukan');
    }
}

    /**
     * Check payment status
     */
    public function checkStatus($merchantOrderId)
    {
        $payment = Pembayaran::with('duitkuPayment')
            ->where('merchant_order_id', $merchantOrderId)
            ->firstOrFail();

        return response()->json([
            'status' => $payment->status,
            'paid' => $payment->status == 1,
            'payment_method' => $payment->duitkuPayment->payment_method ?? null,
            'reference' => $payment->duitkuPayment->reference ?? null
        ]);
    }
}