<?php

use App\Http\Controllers\postController;
use Illuminate\Support\Facades\Route;

Route::get('/', 
    function () {
        return view('welcome');
    }
);

Route::get('/posts', [PostController::class,'index'])->name('posts.index');
Route::get('/create', [PostController::class, 'create'])->name('posts.create');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::put('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::post('/posts', [PostController::class, 'store'])->name("posts.store");
Route::get("/post/{id}/delete", [PostController::class, "destroy"]) ->name("posts.destroy");
