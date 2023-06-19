<?php

use Illuminate\Support\Facades\Route;
use Src\Modules\Blog\Infrastructure\Http\Controllers\Posts\PostShowController;
use Src\Modules\Blog\Infrastructure\Http\Controllers\{IndexController, CategoryController};

Route::get('/', IndexController::class);
Route::get('/posts/{post}', PostShowController::class)->name('post.show');
Route::get('/categories/{category}', CategoryController::class)->name('post.category');