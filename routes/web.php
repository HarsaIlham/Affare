<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('components.landing');
});

Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('login', [AuthController::class, 'loginform'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('role', [AuthController::class, 'roleform'])->name('role');
    Route::get('register', [AuthController::class, 'registerform'])->name('register');
});