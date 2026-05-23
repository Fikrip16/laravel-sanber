<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\genreController;
use App\Http\Controllers\booksController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;

Route::get('/', [DashboardController::class, 'home'] ); 
Route::get('/form', [FormController::class, 'register'] ); 
Route::post('/welcome', [FormController::class, 'welkam'] ); 
Route::get('/master',function(){
    return view ('layouts.master');
}
); 
Route::middleware(['auth',IsAdmin::class])->group(function(){
//create data
Route::get("/genre/create",[genreController::class, 'create']);
Route::post("/genre",[genreController::class, 'store']);
//edit data
Route::get("/genre/{id}/edit",[genreController::class, 'edit']);
Route::put("/genre/{id}",[genreController::class, 'update']);
Route::delete("/genre/{id}",[genreController::class, 'destroy']);
 

});
//read data
Route::get("/genre",[genreController::class, 'index']);
Route::get("/genre/{id}",[genreController::class, 'show']);

Route::resource('books',booksController::class);

Route::get('/register', [AuthController::class, 'showregister']);
Route::post('/register', [AuthController::class, 'registeruser']);

Route::post('/login', [AuthController::class, 'login']);
Route::get('/login', [AuthController::class, 'showlogin'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('/profile',[AuthController::class, 'getprofile'])->middleware('auth');
Route::post('/profile',[AuthController::class, 'createprofile'])->middleware('auth');
Route::put('/profile/{id}',[AuthController::class, 'updateProfile'])->middleware('auth');

Route::post('/comments/{books_id}', [CommentController::class, 'store'])->middleware('auth');