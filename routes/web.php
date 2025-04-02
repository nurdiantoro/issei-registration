<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('/registration');
});

// Registration
Route::get('/registration',         [RegistrationController::class, 'registration'])->name('registration');
Route::post('/registration/create', [RegistrationController::class, 'create']);

Route::get('/{uuid}', [FrontendController::class, 'profile']);
Route::get('/download/pdf/{uuid}', [PdfController::class, 'download'])->name('download.pdf');

// Email
Route::get('/send/barcode/{uuid}', [EmailController::class, 'SendBarcode'])->name('send.barcode');
