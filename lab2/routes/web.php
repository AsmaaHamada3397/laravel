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
Route::post('/posts', [PostController::class, 'store'])->name("posts.store");
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');//done
Route::get("/post/{id}/delete", [PostController::class, "destroy"]) ->name("posts.destroy");
