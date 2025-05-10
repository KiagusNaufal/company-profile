<?php

use App\Http\Controllers\HomeController;
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

