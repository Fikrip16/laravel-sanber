<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [DashboardController::class, 'home'] ); 
Route::get('/form', [FormController::class, 'register'] ); 
Route::post('/welcome', [FormController::class, 'welkam'] ); 
