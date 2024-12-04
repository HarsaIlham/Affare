<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\ProfileController;


Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('login', [AuthController::class, 'loginform'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('role', [AuthController::class, 'roleform'])->name('role');
    Route::get('register', [AuthController::class, 'registerform'])->name('register');
});

Route::get('/homepage', [HomepageController::class, 'homepage'])->name('homepage-seeker');
Route::get('/perusahaan', [PerusahaanController::class, 'perusahaan'])->name('perusahaan');



Route::prefix('profile')->name('profile.')->group(function () {
    Route::get('/user', [ProfileController::class, 'showProfile'])->name('user');
    Route::get('/edit', [ProfileController::class, 'editProfile'])->name('edit');
    Route::get('/change-password', [ProfileController::class, 'changePassword'])->name('change-password');
});



