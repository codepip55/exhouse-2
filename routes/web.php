<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

Route::get('/', [PagesController::class, 'getHome']);
Route::get('/huizen', [PagesController::class, 'getHuizen']);
Route::get('/overons', [PagesController::class, 'getOverOns']);
Route::get('/contact', [PagesController::class, 'getContact']);
