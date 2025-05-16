<?php

use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\SerialNumberController;
use Cloudinary\Cloudinary;
use Cloudinary\Configuration\Configuration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::post('payment/callback', [PembayaranController::class, 'callbackHandler'])
    ->name('payment.callback');

    Route::post('serial-number/signin', [SerialNumberController::class, 'login']);

    Route::post('serial-number', [SerialNumberController::class, 'store']);

Route::prefix('serial-number')->group(function () {
    Route::post('/logout', [SerialNumberController::class, 'logout'])->middleware('auth:api');
    Route::post('/refresh', [SerialNumberController::class, 'refresh'])->middleware('auth:api');
    Route::get('/{serialNumberId}', [SerialNumberController::class, 'show'])->middleware('auth:api');
    Route::post('/{serialNumberId}/change-password', [SerialNumberController::class, 'changePassword'])->middleware('auth:api');
Route::post('/{serialNumberId}/update', [SerialNumberController::class, 'update'])->middleware('auth:api');

    Route::get('/me', [SerialNumberController::class, 'me'])->middleware('auth:api');
});