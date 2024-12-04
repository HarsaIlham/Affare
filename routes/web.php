<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('components.home');
});

Route::group(['middleware' => ['guest:seeker,company']], function () {
    Route::get('/loginseeker', [AuthController::class, 'loginseeker'])->name('loginseeker');
    Route::get('/logincompany', [AuthController::class, 'logincompany'])->name('logincompany');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
    Route::get('/role-register', [AuthController::class, 'roleregister'])->name('role-register');
    Route::get('/role-login', [AuthController::class, 'rolelogin'])->name('role-login');
    Route::get('/registerseeker', [RegisterController::class, 'registerseekerform'])->name('registerseeker')->middleware('guest');
    Route::post('/registerseeker', [RegisterController::class, 'storeseeker'])->name('storeseeker');
    Route::get('/registercompany', [RegisterController::class, 'registercompanyform'])->name('registercompany')->middleware('guest');
    Route::post('/registercompany', [RegisterController::class, 'storecompany'])->name('storecompany');
});

Route::group(['middleware' => ['auth:seeker']], function () {

});

Route::group(['middleware' => ['auth:company']], function () {
    
});

Route::group(['middleware' => ['auth:seeker,company']], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/kotas/{nama}', [KotaController::class, 'getCitiesByProvince']);
