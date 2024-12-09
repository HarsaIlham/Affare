<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\SeekerController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TerdaftarController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\ProfileCompanyController;
use App\Http\Controllers\LowonganCompanyController;



Route::group(['middleware' => ['guest:seeker,company']], function () {
    Route::get('/homepage', [HomepageController::class, 'homepage'])->name('homepage-seeker');
    Route::get('/', function () {return view('components.landing');});
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
    Route::get('/homepage', [HomepageController::class, 'homepage'])->name('homepage-seeker');
    Route::get('/terdaftar', [TerdaftarController::class, 'terdaftar'])->name('terdaftar');
    Route::get('/user', [ProfileController::class, 'showProfile'])->name('profile-seeker');
    Route::get('/edit', [ProfileController::class, 'editProfile'])->name('edit');
    Route::get('/change-password', [ProfileController::class, 'changePassword'])->name('change-password');
    Route::get('/cv-and-portofolio', [ProfileController::class, 'CVandPortofolio'])->name('cv-and-portofolio');
    Route::put('/update-foto/{user}', [SeekerController::class, 'updatefoto'])->name('update-foto');
    Route::put('/updatebio/{user}', [SeekerController::class, 'updatebio'])->name('update-bio');
    Route::put('/updatecv/{user}', [SeekerController::class, 'updatecv'])->name('update-cv');
    Route::put('/updateportofolio/{user}', [SeekerController::class, 'updateportofolio'])->name('update-portofolio');
    Route::put('/updatepassword/{user}', [SeekerController::class, 'updatepassword'])->name('update-password');
});

Route::group(['middleware' => ['auth:company']], function () {
    Route::get('/companydashboard', [CompanyController::class, 'companydashboard'])->name('companydashboard');
});

Route::group(['middleware' => ['auth:seeker,company']], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});



Route::get('/review-lamaran', function () {
    return view('review-lamaran');
});

Route::prefix('company/profile')->name('company.profile.')->group(function () {
    Route::get('user-company', [ProfileCompanyController::class, 'showcompanyProfile'])->name('user-company');
    Route::get('edit-company', [ProfileCompanyController::class, 'editcompanyProfile'])->name('edit-company');
    Route::get('change-password-company', [ProfileCompanyController::class, 'changecompanyPassword'])->name('change-password-company');
});

Route::prefix('company')->name('company.')->group(function () {
    Route::get('lowongancompany', [LowonganCompanyController::class, 'showLowonganCompany'])->name('lowongancompany');
    Route::get('postlowongan', [LowonganCompanyController::class, 'postlowongan'])->name('postlowongan');
    Route::get('updatelowongan', [LowonganCompanyController::class, 'updatelowongan'])->name('updatelowongan');
});

Route::get('/kotas/{nama}', [KotaController::class, 'getCitiesByProvince']);
Route::get('/perusahaan', [PerusahaanController::class, 'perusahaan'])->name('perusahaan');
