<?php

use App\Http\Controllers\postController;
use Illuminate\Support\Facades\Route;

Route::get('/', 
    function () {
        return view('welcome');
    }
);

Route::get('/posts', [PostController::class,'index'])->name('posts.index');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::get('/posts/create', [postController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name("posts.store");
