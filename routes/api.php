<?php

use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\SerialNumberBasicController;
use App\Http\Controllers\SerialNumberController;
use Cloudinary\Cloudinary;
use Cloudinary\Configuration\Configuration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::post('payment/callback', [PembayaranController::class, 'callbackHandler'])
    ->name('payment.callback');

    
    Route::post('serial-number', [SerialNumberController::class, 'store']);
    Route::prefix('serial-number-basic')->group(function () {
        Route::post('signin', [SerialNumberBasicController::class, 'login']);
    Route::post('/logout', [SerialNumberBasicController::class, 'logout'])->middleware('auth:api');
    Route::post('/refresh', [SerialNumberBasicController::class, 'refresh'])->middleware('auth:api');
    Route::get('/{serialNumberId}', [SerialNumberBasicController::class, 'show'])->middleware('auth:api');
    Route::post('/{serialNumberId}/change-password', [SerialNumberBasicController::class, 'changePassword'])->middleware('auth:api');
Route::post('/{serialNumberId}/update', [SerialNumberBasicController::class, 'update'])->middleware('auth:api');

    Route::get('/me', [SerialNumberBasicController::class, 'me'])->middleware('auth:api');

});
    
    
    
    Route::prefix('serial-number')->group(function () {
        Route::post('signin', [SerialNumberController::class, 'login']);

    Route::post('/logout', [SerialNumberController::class, 'logout'])->middleware('auth:api');
    Route::post('/refresh', [SerialNumberController::class, 'refresh'])->middleware('auth:api');
    Route::get('/{serialNumberId}', [SerialNumberController::class, 'show'])->middleware('auth:api');
    Route::post('/{serialNumberId}/change-password', [SerialNumberController::class, 'changePassword'])->middleware('auth:api');
Route::post('/{serialNumberId}/update', [SerialNumberController::class, 'update'])->middleware('auth:api');

    Route::get('/me', [SerialNumberController::class, 'me'])->middleware('auth:api');

});