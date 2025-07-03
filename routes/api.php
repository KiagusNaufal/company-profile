<?php

use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\SerialNumberBasicController;
use App\Http\Controllers\SerialNumberController;
use Illuminate\Support\Facades\Route;

// Payment callback route
Route::post('payment/callback', [PembayaranController::class, 'callbackHandler'])
    ->name('payment.callback');

// Single serial number creation route
Route::post('serial-number', [SerialNumberController::class, 'store']);

// Serial Number Basic Routes
Route::prefix('serial-number-basic')->group(function () {
    Route::post('login', [SerialNumberBasicController::class, 'signin']); // Changed from signin to signin
    Route::middleware('auth:api_basic')->group(function () { // Specific guard
        Route::post('/logout', [SerialNumberBasicController::class, 'logout']);
        Route::post('/refresh', [SerialNumberBasicController::class, 'refresh']);
        Route::get('/{serialNumberId}', [SerialNumberBasicController::class, 'show']);
        Route::post('/{serialNumberId}/change-password', [SerialNumberBasicController::class, 'changePassword']);
        Route::post('/{serialNumberId}/update', [SerialNumberBasicController::class, 'update']);
        Route::get('/me', [SerialNumberBasicController::class, 'me']);
    });
});

// Serial Number Routes
Route::prefix('serial-number')->group(function () {
    Route::post('signin', [SerialNumberController::class, 'signin']); // Changed from signin to login
    Route::middleware('auth:api_serial')->group(function () { // Specific guard
        Route::post('/logout', [SerialNumberController::class, 'logout']);
        Route::post('/refresh', [SerialNumberController::class, 'refresh']);
        Route::get('/{serialNumberId}', [SerialNumberController::class, 'show']);
        Route::post('/{serialNumberId}/change-password', [SerialNumberController::class, 'changePassword']);
        Route::post('/{serialNumberId}/update', [SerialNumberController::class, 'update']);
        Route::get('/me', [SerialNumberController::class, 'me']);
    });
});