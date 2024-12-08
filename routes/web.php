<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TerdaftarController;



Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('login', [AuthController::class, 'loginform'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('role', [AuthController::class, 'roleform'])->name('role');
    Route::get('register', [AuthController::class, 'registerform'])->name('register');
});

Route::get('/homepage', [HomepageController::class, 'homepage'])->name('homepage-seeker');
Route::get('/perusahaan', [PerusahaanController::class, 'perusahaan'])->name('perusahaan');
Route::get('/terdaftar', [TerdaftarController::class, 'terdaftar'])->name('terdaftar');



Route::prefix('profile')->name('profile.')->group(function () {
    Route::get('/user', [ProfileController::class, 'showProfile'])->name('user');
    Route::get('/edit', [ProfileController::class, 'editProfile'])->name('edit');
    Route::get('/change-password', [ProfileController::class, 'changePassword'])->name('change-password');
    Route::get('/cv-and-portofolio', [ProfileController::class, 'CVandPortofolio'])->name('cv-and-portofolio');
});

Route::get('/review-lamaran', function () {
    return view('review-lamaran');
});



