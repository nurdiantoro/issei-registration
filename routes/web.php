<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\VisitorController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('/registration');
});

// Registration
Route::get('/registration',         [RegistrationController::class, 'registration'])->name('registration');
Route::post('/registration/create', [RegistrationController::class, 'create']);

Route::get('/user/{uuid}', [FrontendController::class, 'profile']);
Route::get('/download/pdf/{uuid}', [PdfController::class, 'download'])->name('download.pdf');

Route::get('/check-in', [VisitorController::class, 'index'])->name('check-in.index');
Route::post('/check-in/store', [VisitorController::class, 'store'])->name('check-in.store');


// Email
Route::get('/send/barcode/{uuid}', [EmailController::class, 'SendBarcode'])->name('send.barcode');
