<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\WorksController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', function () {
    return view('page.about');
});
Route::get('/contact', function () {
    return view('page.contact');
});
Route::get('/service', function () {
    return view('page.services');
})->name('services');
Route::get('/works', [WorksController::class, 'index'])->name('works');

Route::prefix('payment')->group(function () {
    // Create payment (called from your JavaScript)
    Route::post('/create', [PembayaranController::class, 'createPayment'])
        ->name('payment.create');
    
    // Duitku Callback URL (must be publicly accessible)
Route::post('/callback', [PembayaranController::class, 'callbackHandler'])
    ->withoutMiddleware(VerifyCsrfToken::class);
    
// Payment Return Page (where users are redirected after payment)
Route::get('/return', [PembayaranController::class, 'paymentReturn'])
    ->name('payment.return');
    
// Payment Status Check
Route::get('/status/{merchantOrderId}', [PembayaranController::class, 'checkStatus'])
    ->name('payment.status');
});
// Authentication Routes
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/post', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Protected Routes - Requires Authentication
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard.dashboard');
    })->name('dashboard');
    
    // Product Routes
    Route::prefix('produk')->group(function () {
        Route::get('/', [ProdukController::class, 'index'])->name('produk');
        Route::post('/store', [ProdukController::class, 'store'])->name('produk.store');
        Route::put('/{id}', [ProdukController::class, 'update'])->name('produk.update');
        Route::delete('/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
    });

    Route::prefix('kategori')->group(function () {
        Route::get('/', [KategoriController::class, 'index'])->name('kategori');
        Route::post('/store', [KategoriController::class, 'store'])->name('kategori.store');
        Route::put('/{id}', [KategoriController::class, 'update'])->name('kategori.update');
        Route::delete('/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
    });
});