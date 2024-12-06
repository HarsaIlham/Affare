<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('components.landing');
});
Route::group(['middleware' => ['guest:seeker,company']], function () {
    Route::get('/loginseeker', [AuthController::class, 'loginseeker'])->name('loginseeker');
    Route::get('/logincompany', [AuthController::class, 'logincompany'])->name('logincompany');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
    Route::get('/role-register', [AuthController::class, 'roleregister'])->name('role-register');
    Route::get('/role-login', [AuthController::class, 'rolelogin'])->name('login');
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

Route::get('/homepage', [HomepageController::class, 'homepage'])->name('homepage-seeker');
Route::get('/perusahaan', [PerusahaanController::class, 'perusahaan'])->name('perusahaan');



Route::prefix('profile')->name('profile.')->group(function () {
    Route::get('/user', [ProfileController::class, 'showProfile'])->name('user');
    Route::get('/edit', [ProfileController::class, 'editProfile'])->name('edit');
    Route::get('/change-password', [ProfileController::class, 'changePassword'])->name('change-password');
});



