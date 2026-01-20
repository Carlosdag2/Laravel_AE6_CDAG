<?php

use App\Http\Controllers\UserCDAGController;
use App\Http\Controllers\PostCDAGController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('users.index');
});

// Rutas para usuarios
Route::get('/users', [UserCDAGController::class, 'index'])->name('users.index');
Route::get('/users/{id}', [UserCDAGController::class, 'show'])->name('users.show');

// Rutas para posts
Route::get('/posts', [PostCDAGController::class, 'index'])->name('posts.index');
Route::get('/posts/{id}', [PostCDAGController::class, 'show'])->name('posts.show');