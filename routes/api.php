<?php

use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\SerialNumberBasicController;
use App\Http\Controllers\SerialNumberBengkelController;
use App\Http\Controllers\SerialNumberController;
use App\Http\Controllers\SerialNumberIuranController;
use App\Http\Controllers\SerialNumberLaundryController;
use App\Http\Controllers\SerialNumberPomController;
use App\Http\Controllers\SerialNumberServicesController;
use App\Http\Controllers\SerialNumberWashController;
use App\Models\SerialNumberBengkel;
use App\Models\SerialNumberLaundry;
use App\Models\SerialNumberServices;
use Illuminate\Support\Facades\Route;

// Payment callback route
Route::post('payment/callback', [PembayaranController::class, 'callbackHandler'])
    ->name('payment.callback');

// Single serial number creation route
Route::post('serial-number', [SerialNumberController::class, 'store']);

// Serial Number Basic Routes
Route::prefix('serial-number-basic')->group(function () {
    Route::post('signin', [SerialNumberBasicController::class, 'login']); // Changed from signin to signin
    Route::middleware('auth:api_basic')->group(function () { // Specific guard
        Route::post('/logout', [SerialNumberBasicController::class, 'logout']);
        Route::post('/refresh', [SerialNumberBasicController::class, 'refresh']);
        Route::get('/{serialNumberId}', [SerialNumberBasicController::class, 'show']);
        Route::post('/{serialNumberId}/change-password', [SerialNumberBasicController::class, 'changePassword']);
        Route::post('/{serialNumberId}/update', [SerialNumberBasicController::class, 'update']);
        Route::get('/me', [SerialNumberBasicController::class, 'me']);
    });
});
Route::prefix('serial-number-services')->group(function () {
    Route::post('signin', [SerialNumberServices::class, 'login']); // Changed from signin to signin
    Route::middleware('auth:api_services')->group(function () { // Specific guard
        Route::post('/logout', [SerialNumberServicesController::class, 'logout']);
        Route::post('/refresh', [SerialNumberServicesController::class, 'refresh']);
        Route::get('/{serialNumberId}', [SerialNumberServicesController::class, 'show']);
        Route::post('/{serialNumberId}/change-password', [SerialNumberServicesController::class, 'changePassword']);
        Route::post('/{serialNumberId}/update', [SerialNumberServicesController::class, 'update']);
        Route::get('/me', [SerialNumberServicesController::class, 'me']);
    });
});
Route::prefix('serial-number-bengkel')->group(function () {
    Route::post('signin', [SerialNumberBengkelController::class, 'login']); // Changed from signin to signin
    Route::middleware('auth:api_bengkel')->group(function () { // Specific guard
        Route::post('/logout', [SerialNumberBengkelController::class, 'logout']);
        Route::post('/refresh', [SerialNumberBengkelController::class, 'refresh']);
        Route::get('/{serialNumberId}', [SerialNumberBengkelController::class, 'show']);
        Route::post('/{serialNumberId}/change-password', [SerialNumberBengkelController::class, 'changePassword']);
        Route::post('/{serialNumberId}/update', [SerialNumberBengkelController::class, 'update']);
        Route::get('/me', [SerialNumberBengkelController::class, 'me']);
    });
});
Route::prefix('serial-number-laundry')->group(function () {
    Route::post('signin', [SerialNumberLaundryController::class, 'login']); // Changed from signin to signin
    Route::middleware('auth:api_laundry')->group(function () { // Specific guard
        Route::post('/logout', [SerialNumberLaundryController::class, 'logout']);
        Route::post('/refresh', [SerialNumberLaundryController::class, 'refresh']);
        Route::get('/{serialNumberId}', [SerialNumberLaundryController::class, 'show']);
        Route::post('/{serialNumberId}/change-password', [SerialNumberLaundryController::class, 'changePassword']);
        Route::post('/{serialNumberId}/update', [SerialNumberLaundryController::class, 'update']);
        Route::get('/me', [SerialNumberLaundryController::class, 'me']);
    });
});
Route::prefix('serial-number-pom')->group(function () {
    Route::post('signin', [SerialNumberPomController::class, 'login']); // Changed from signin to signin
    Route::middleware('auth:api_pom')->group(function () { // Specific guard
        Route::post('/logout', [SerialNumberPomController::class, 'logout']);
        Route::post('/refresh', [SerialNumberPomController::class, 'refresh']);
        Route::get('/{serialNumberId}', [SerialNumberPomController::class, 'show']);
        Route::post('/{serialNumberId}/change-password', [SerialNumberPomController::class, 'changePassword']);
        Route::post('/{serialNumberId}/update', [SerialNumberPomController::class, 'update']);
        Route::get('/me', [SerialNumberPomController::class, 'me']);
    });
});
Route::prefix('serial-number-iuran')->group(function () {
    Route::post('signin', [SerialNumberIuranController::class, 'login']); // Changed from signin to signin
    Route::middleware('auth:api_iuran')->group(function () { // Specific guard
        Route::post('/logout', [SerialNumberIuranController::class, 'logout']);
        Route::post('/refresh', [SerialNumberIuranController::class, 'refresh']);
        Route::get('/{serialNumberId}', [SerialNumberIuranController::class, 'show']);
        Route::post('/{serialNumberId}/change-password', [SerialNumberIuranController::class, 'changePassword']);
        Route::post('/{serialNumberId}/update', [SerialNumberIuranController::class, 'update']);
        Route::get('/me', [SerialNumberIuranController::class, 'me']);
    });
});
Route::prefix('serial-number-wash')->group(function () {
    Route::post('signin', [SerialNumberWashController::class, 'login']); // Changed from signin to signin
    Route::middleware('auth:api_wash')->group(function () { // Specific guard
        Route::post('/logout', [SerialNumberWashController::class, 'logout']);
        Route::post('/refresh', [SerialNumberWashController::class, 'refresh']);
        Route::get('/{serialNumberId}', [SerialNumberWashController::class, 'show']);
        Route::post('/{serialNumberId}/change-password', [SerialNumberWashController::class, 'changePassword']);
        Route::post('/{serialNumberId}/update', [SerialNumberWashController::class, 'update']);
        Route::get('/me', [SerialNumberWashController::class, 'me']);
    });
});

// Serial Number Routes
Route::prefix('serial-number')->group(function () {
    Route::post('signin', [SerialNumberController::class, 'login']); // Changed from signin to login
    Route::middleware('auth:api_serial')->group(function () { // Specific guard
        Route::post('/logout', [SerialNumberController::class, 'logout']);
        Route::post('/refresh', [SerialNumberController::class, 'refresh']);
        Route::get('/{serialNumberId}', [SerialNumberController::class, 'show']);
        Route::post('/{serialNumberId}/change-password', [SerialNumberController::class, 'changePassword']);
        Route::post('/{serialNumberId}/update', [SerialNumberController::class, 'update']);
        Route::get('/me', [SerialNumberController::class, 'me']);
    });
});