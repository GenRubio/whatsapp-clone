<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

// Home Routes
Route::prefix('home')->group(function () {
    Route::post('/login', [LoginController::class, 'userValidation'])->name('home.login');
    Route::post('/register', [RegisterController::class, 'register'])->name('home.register');
});

// Routes require auth
Route::middleware('auth')->group(function () {
    // Setting Routes
    Route::prefix('settings')->group(function () {
        Route::get('/log-out', [LoginController::class, 'logOut'])->name('settings.logOut');
    });
});
