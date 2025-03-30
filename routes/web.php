<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    // Login
    Route::get('/login',        [AuthController::class, 'index'])->name('login');
    Route::post('/login/check', [AuthController::class, 'login'])->name('login.check');

    // Registration
    Route::get('/registration',         [RegistrationController::class, 'registration'])->name('registration');
    Route::post('/registration/create', [RegistrationController::class, 'create']);
});

Route::middleware('auth')->group(function () {
    Route::get('/', [FrontendController::class, 'profile']);
    Route::get('/download/pdf', [PdfController::class, 'index'])->name('download.pdf');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Email
Route::get('/send/barcode/{id}', [EmailController::class, 'SendBarcode'])->name('send.barcode');
