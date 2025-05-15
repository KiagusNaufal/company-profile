<?php

use App\Http\Controllers\PembayaranController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('payment/callback', [PembayaranController::class, 'callbackHandler'])
    ->name('payment.callback');
