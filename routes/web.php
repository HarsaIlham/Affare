<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\SeekerController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LamaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TerdaftarController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\ProfileCompanyController;
use App\Http\Controllers\LowonganCompanyController;

Route::get('/filter', [LowonganCompanyController::class, 'filter'])->name('filter');
Route::get('/search', [LowonganCompanyController::class, 'search'])->name('search');
Route::get('/homepage', [HomepageController::class, 'homepage'])->name('homepage-seeker');
Route::group(['middleware' => ['guest:seeker,company']], function () {
    Route::get('/', function () {return view('components.landing');})->name('landing');
    Route::get('/detaillowongan/{id}/detail', [HomepageController::class, 'detaillowongan'])->name('detail-lowongan');
    Route::get('/loginseeker', [AuthController::class, 'loginseeker'])->name('loginseeker');
    Route::get('/logincompany', [AuthController::class, 'logincompany'])->name('logincompany');
    Route::post('/loginseeker', [AuthController::class, 'authenticateseeker'])->name('authenticateseeker');
    Route::post('/logincompany', [AuthController::class, 'authenticatecompany'])->name('authenticatecompany');
    Route::get('/role-register', [AuthController::class, 'roleregister'])->name('role-register');
    Route::get('/role-login', [AuthController::class, 'rolelogin'])->name('login');
    Route::get('/registerseeker', [RegisterController::class, 'registerseekerform'])->name('registerseeker')->middleware('guest');
    Route::post('/registerseeker', [RegisterController::class, 'storeseeker'])->name('storeseeker');
    Route::get('/registercompany', [RegisterController::class, 'registercompanyform'])->name('registercompany')->middleware('guest');
    Route::post('/registercompany', [RegisterController::class, 'storecompany'])->name('storecompany');
});
Route::group(['middleware' => ['auth:seeker']], function () {
    Route::get('/terdaftar', [HomepageController::class, 'terdaftar'])->name('terdaftar');
    Route::delete('/terdaftar', [LamaranController::class, 'destroy'])->name('batalkan-lamaran');
    Route::get('/user', [ProfileController::class, 'showProfile'])->name('profile-seeker');
    Route::get('/edit', [ProfileController::class, 'editProfile'])->name('edit');
    Route::get('/change-password', [ProfileController::class, 'changePassword'])->name('change-password');
    Route::get('/cv-and-portofolio', [ProfileController::class, 'CVandPortofolio'])->name('cv-and-portofolio');
    Route::put('/update-foto/{user}', [SeekerController::class, 'updatefoto'])->name('update-foto');
    Route::put('/updatebio/{user}', [SeekerController::class, 'updatebio'])->name('update-bio');
    Route::put('/updatecv/{user}', [SeekerController::class, 'updatecv'])->name('update-cv');
    Route::put('/updateportofolio/{user}', [SeekerController::class, 'updateportofolio'])->name('update-portofolio');
    Route::put('/updatepassword/{user}', [SeekerController::class, 'updatepassword'])->name('update-password');
    Route::post('/lamar/{id}', [LamaranController::class, 'lamar'])->name('lamar');
});

Route::group(['middleware' => ['auth:company']], function () {
    Route::get('/searchdashboard', [LowonganCompanyController::class, 'searchcompanydashboard'])->name('searchdashboard');
    Route::get('/searchlowongan', [LowonganCompanyController::class, 'searchlowongan'])->name('searchlowongan');
    Route::get('/companydashboard', [CompanyController::class, 'companydashboard'])->name('companydashboard');
    Route::get('/lowongancompany', [LowonganCompanyController::class, 'showLowonganCompany'])->name('lowongancompany');
    Route::get('/reviewlamaran', [CompanyController::class, 'reviewlamaran'])->name('reviewlamaran');
    Route::put('/updatestatus', [LamaranController::class, 'updatestatus'])->name('updatestatus');
    Route::get('postlowongan', [LowonganCompanyController::class, 'postlowongan'])->name('postlowongan');
    Route::post('/postlowongan', [LowonganCompanyController::class, 'store'])->name('storelowongan');
    Route::get('/updatelowongan/{id}/edit', [LowonganCompanyController::class, 'updatelowongan'])->name('updatelowongan');
    Route::put('/updatelowongan/{id}', [LowonganCompanyController::class, 'update'])->name('update');
    Route::delete('/lowongancompany/{id}', [LowonganCompanyController::class, 'destroy'])->name('deletelowongan');
    Route::get('/user-company', [ProfileCompanyController::class, 'showcompanyProfile'])->name('user-company');
    Route::put('/updatecompany/{user}', [CompanyController::class, 'updatebio'])->name('updatebiocompany');
    Route::put('/updatecompanylogo/{user}', [CompanyController::class, 'updatelogo'])->name('updatelogocompany');
    Route::get('/edit-company', [ProfileCompanyController::class, 'editcompanyProfile'])->name('edit-company');
    Route::get('/change-password-company', [ProfileCompanyController::class, 'changecompanyPassword'])->name('change-password-company');
    Route::put('/updatepasswordcompany/{user}', [CompanyController::class, 'updatepassword'])->name('update-password-company');
});

Route::group(['middleware' => ['auth:seeker,company']], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


Route::get('/kotas/{nama}', [KotaController::class, 'getCitiesByProvince']);
Route::get('/perusahaan', [HomepageController::class, 'perusahaan'])->name('perusahaan');
