<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\genreController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'home'] ); 
Route::get('/form', [FormController::class, 'register'] ); 
Route::post('/welcome', [FormController::class, 'welkam'] ); 
Route::get('/master',function(){
    return view ('layouts.master');
}
); 
Route::get("/genre/create",[genreController::class, 'create']);
Route::post("/genre",[genreController::class, 'store']);

Route::get("/genre",[genreController::class, 'index']);
Route::get("/genre/{id}",[genreController::class, 'show']);
Route::get("/genre/{id}/edit",[genreController::class, 'edit']);
Route::put("/genre/{id}",[genreController::class, 'update']);
Route::delete("/genre/{id}",[genreController::class, 'destroy']);