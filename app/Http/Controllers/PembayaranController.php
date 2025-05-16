<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Http\Requests\StorePembayaranRequest;
use App\Http\Requests\UpdatePembayaranRequest;
use App\Models\PembayaranDuitku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log; 
use Illuminate\Support\Facades\Validator;
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

   public function callbackHandler(Request $request)
{
    Log::info('Duitku Callback Received:', $request->all());

    try {
        $callbackData = $request->all();

        // 1. Verifikasi signature
        $merchantCode = $callbackData['merchantCode'];
        $amount = $callbackData['amount'];
        $merchantOrderId = $callbackData['merchantOrderId'];
        $signature = $callbackData['signature'];

        // Format string sesuai dokumentasi Duitku
        $stringToHash = $merchantCode . $amount . $merchantOrderId . $this->apiKey;
        
        // Gunakan MD5 sesuai spesifikasi Duitku
        $expectedSignature = md5($stringToHash);
        
        Log::debug('Verification Details:', [
            'input_string' => $merchantCode . '|' . $amount . '|' . $merchantOrderId . '|' . '[API_KEY_HIDDEN]',
            'expected' => $expectedSignature,
            'received' => $signature
        ]);

        if ($signature !== $expectedSignature) {
            Log::error('Signature verification failed', [
                'expected' => $expectedSignature,
                'received' => $signature,
                'data' => $callbackData
            ]);
            throw new \Exception('Invalid callback signature');
        }

        // 2. Cari transaksi
        $pembayaran = Pembayaran::where('merchant_order_id', $merchantOrderId)->firstOrFail();
        $duitkuPayment = PembayaranDuitku::where('merchant_order_id', $merchantOrderId)->firstOrFail();

        // 3. Update status pembayaran
        $status = $this->mapDuitkuStatus($callbackData['resultCode']);

        DB::transaction(function () use ($pembayaran, $duitkuPayment, $callbackData, $status) {
            $pembayaran->update(['status' => $status]);

            $duitkuPayment->update([
                'callback_response' => json_encode($callbackData),
                'status' => $this->getStatusText($status),
                'payment_method' => $callbackData['paymentMethod'] ?? null
            ]);
        });

        return response()->json(['success' => true]);

    } catch (\Exception $e) {
        Log::error('Callback Error: ' . $e->getMessage());
        return response()->json(['success' => false], 400);
    }
}

    private function mapDuitkuStatus($resultCode)
    {
        return match ($resultCode) {
            '00' => 1, // Success
            '01' => 2, // Failed
            default => 0 // Pending
        };
    }

    private function getStatusText($statusCode)
    {
        return match ($statusCode) {
            1 => 'success',
            2 => 'failed',
            default => 'pending'
        };
    }

    // Add to PembayaranController
    public function paymentReturn(Request $request)
    {
        $merchantOrderId = $request->input('merchantOrderId');
        $reference = $request->input('reference');

        // Get payment details
        $payment = Pembayaran::with('duitkuPayment')
            ->where('merchant_order_id', $merchantOrderId)
            ->firstOrFail();

        return view('payment.return', compact('payment'));
    }

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

    public function createPayment(Request $request)
    {
        DB::beginTransaction();

        try {
            $validated = $request->validate([
                'produk_id' => 'required|exists:produk,id',
                'amount' => 'required|numeric|min:1000',
                'email' => 'required|email',
                'customer_name' => 'required|string',
                'phone_number' => 'required|string'
            ]);

            // 1. Generate Merchant Order ID
            $merchantOrderId = Str::uuid()->toString();

            // 2. Simpan ke pembayaran_duitku DULU
            $duitkuPayment = PembayaranDuitku::create([
                'merchant_order_id' => $merchantOrderId,
                'status' => 'pending'
            ]);

            // 3. Baru simpan ke pembayaran
            $pembayaran = Pembayaran::create([
                'produk_id' => $validated['produk_id'],
                'merchant_order_id' => $merchantOrderId,
                'nominal' => $validated['amount'],
                'customer_email' => $validated['email'],
                'customer_name' => $validated['customer_name'],
                'customer_phone' => $validated['phone_number'],
                'status' => 0
            ]);

            // 4. Hubungkan ke Duitku
            $duitkuResponse = $this->createDuitkuInvoice($pembayaran);

            if ($duitkuResponse['statusCode'] != '00') {
                throw new \Exception($duitkuResponse['statusMessage'] ?? 'Gagal membuat invoice Duitku');
            }

            // 5. Update data Duitku
            $duitkuPayment->update([
                'reference' => $duitkuResponse['reference'],
                'payment_method' => $duitkuResponse['paymentMethod'] ?? null,
                'transaction_response' => $duitkuResponse
            ]);

            DB::commit();

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
                'message' => env('APP_DEBUG')
                    ? $e->getMessage()
                    : 'Terjadi kesalahan sistem. Silakan coba lagi.'
            ], 500);
        }
    }

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
            'expiryPeriod' => 1440, // 24 jam dalam menit
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
            throw new \Exception('Gagal terhubung ke payment gateway');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePembayaranRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePembayaranRequest $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
