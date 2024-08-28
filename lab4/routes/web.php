<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

Route::get('/', 
    function () {
        return view('welcome');
    }
);


Route::resource('posts', PostController::class);
Route::resource('users', UserController::class);
Route::post('/posts/restore/{id}', [PostController::class, 'restore'])->name('posts.restore');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
