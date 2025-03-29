<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', [Controller::class, 'index']);
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.check');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/registration', [RegistrationController::class, 'registration'])->name('registration');
Route::post('/registration/create', [RegistrationController::class, 'create']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [FrontendController::class, 'profile']);
});
