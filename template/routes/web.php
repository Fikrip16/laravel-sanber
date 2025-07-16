<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'home'] ); 
Route::get('/form', [FormController::class, 'register'] ); 
Route::post('/welcome', [FormController::class, 'welkam'] ); 
Route::get('/master',function(){
    return view ('layouts.master');
}
); 
