<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\WorksController;
use Illuminate\Support\Facades\Route;

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

Route::get('/works', [WorksController::class, 'index']);

Route::get('/dashboard', function () {
    return view('admin.dashboard.dashboard');
})->name('dashboard');

Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
Route::post('/produk/store', [ProdukController::class, 'store'])->name('produk.store');
Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/post', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
