@extends('layout.header')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6">
            @if($isSuccess)
                <div class="text-center">
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                        <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h2 class="mt-3 text-lg font-medium text-gray-900">Pembayaran Berhasil!</h2>
                    <p class="mt-2 text-sm text-gray-500">
                        Terima kasih telah melakukan pembayaran.
                        @if($hasSerialNumber)
                            Serial number telah dikirim ke email <strong>{{ $payment->customer_email }}</strong>.
                        @endif
                    </p>
                    
                    <div class="mt-5 bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-sm font-medium text-gray-900">Detail Transaksi</h3>
                        <div class="mt-2 space-y-1">
                            <p class="text-sm text-gray-600 flex justify-between">
                                <span>Produk:</span>
                                <span>{{ $payment->produk->name }}</span>
                            </p>
                            <p class="text-sm text-gray-600 flex justify-between">
                                <span>Order ID:</span>
                                <span>{{ $payment->merchant_order_id }}</span>
                            </p>
                            <p class="text-sm text-gray-600 flex justify-between">
                                <span>Metode Pembayaran:</span>
                                <span>{{ $paymentMethod ?? '-' }}</span>
                            </p>
                            <p class="text-sm text-gray-600 flex justify-between">
                                <span>Total:</span>
                                <span>Rp {{ number_format($payment->nominal, 0, ',', '.') }}</span>
                            </p>
                            <p class="text-sm text-gray-600 flex justify-between">
                                <span>Status:</span>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Berhasil
                                </span>
                            </p>
                        </div>
                    </div>

                    @if($hasSerialNumber)
                    <div class="mt-4 bg-blue-50 p-4 rounded-lg">
                        <h3 class="text-sm font-medium text-blue-800">Informasi Serial Number</h3>
                        <p class="mt-1 text-sm text-blue-700">
                            Silakan cek email Anda di <strong>{{ $payment->customer_email }}</strong> untuk mendapatkan serial number dan instruksi penggunaan.
                        </p>
                    </div>
                    @endif
                </div>
            @else
                <div class="text-center">
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                        <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                    <h2 class="mt-3 text-lg font-medium text-gray-900">
                        {{ $status == 2 ? 'Pembayaran Gagal' : 'Menunggu Pembayaran' }}
                    </h2>
                    
                    <div class="mt-5 bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-sm font-medium text-gray-900">Detail Transaksi</h3>
                        <div class="mt-2 space-y-1">
                            <p class="text-sm text-gray-600 flex justify-between">
                                <span>Order ID:</span>
                                <span>{{ $payment->merchant_order_id }}</span>
                            </p>
                            <p class="text-sm text-gray-600 flex justify-between">
                                <span>Total:</span>
                                <span>Rp {{ number_format($payment->nominal, 0, ',', '.') }}</span>
                            </p>
                            <p class="text-sm text-gray-600 flex justify-between">
                                <span>Status:</span>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                    {{ $status == 2 ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ $status == 2 ? 'Gagal' : 'Pending' }}
                                </span>
                            </p>
                        </div>
                    </div>

                    @if($status == 0)
                    <div class="mt-4 bg-yellow-50 p-4 rounded-lg">
                        <h3 class="text-sm font-medium text-yellow-800">Instruksi Pembayaran</h3>
                        <p class="mt-1 text-sm text-yellow-700">
                            Silakan selesaikan pembayaran Anda. Jika sudah membayar tetapi status belum berubah, hubungi customer service.
                        </p>
                    </div>
                    @endif
                </div>
            @endif

            <div class="mt-6 space-y-3">
                <a href="/" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Kembali ke Beranda
                </a>
                
                @if($isSuccess && $hasSerialNumber)
                <button onclick="window.print()" class="w-full flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Cetak Invoice
                </button>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection