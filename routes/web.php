<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardCompanyController;
use App\Http\Controllers\ProfileCompanyController;
use App\Http\Controllers\LowonganCompanyController;

Route::get('/', function () {
    return view('landing');
});

Route::get('/companydashboard', [DashboardCompanyController::class, 'companydashboard'])->name('companydashboard');


Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('login', [AuthController::class, 'loginform'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('role', [AuthController::class, 'roleform'])->name('role');
    Route::get('register', [AuthController::class, 'registerform'])->name('register');
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



