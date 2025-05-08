<?php

use App\Http\Controllers\WorksController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('page.home');
});

Route::get('/about', function () {
    return view('page.about');
});

Route::get('/contact', function () {
    return view('page.contact');
});
Route::get('/service', function () {
    return view('page.services');
});

Route::get('/works', [WorksController::class, 'index']);

