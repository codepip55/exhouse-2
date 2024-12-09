<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HuizenController;

Route::get('/', [PagesController::class, 'getHome']);
Route::get('/huizen', [HuizenController::class, 'getHuizenPagina'])->name('huizen');
Route::get('/huizen/{id}', [HuizenController::class, 'getHuisPagina'])->name('huis');
Route::get('/overons', [PagesController::class, 'getOverOns']);
Route::get('/contact', [PagesController::class, 'getContact']);

Route::middleware('guest')->group(function () {
    Route::get('/login', [PagesController::class, 'getLogin']);
    Route::get('/register', [PagesController::class, 'getSignup']);
    Route::get('/forgotpassword', [PagesController::class, 'getResetPassword'])->name('password.request');
    Route::get('/resetpassword/{token}', [PagesController::class, 'getResetPasswordForm'])->name('password.reset');

    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::post('/register', [LoginController::class, 'register']);
    Route::post('/forgotpassword', [LoginController::class, 'resetPassword'])->name('password.email');
    Route::post('/resetpassword', [LoginController::class, 'updatePassword'])->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [LoginController::class, 'logout']);
    Route::post('/contact', [PagesController::class, 'postContact']);

    Route::get('/dashboard', [PagesController::class, 'getDashboard'])->name('dashboard.home');
});
