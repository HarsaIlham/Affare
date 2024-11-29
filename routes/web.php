<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KotaController;

Route::get('/', function () {
    return view('components.home');
});

Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('login', [AuthController::class, 'loginform'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('role', [AuthController::class, 'roleform'])->name('role');
    Route::get('registerseeker', [AuthController::class, 'registerseekerform'])->name('seeker');
    Route::get('registercompany', [AuthController::class, 'registercompanyform'])->name('company');
});
Route::get('/get-cities/{province_id}', [KotaController::class, 'getCities'])->name('get.cities');