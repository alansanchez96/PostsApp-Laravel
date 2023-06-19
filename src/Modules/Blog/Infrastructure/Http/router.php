<?php

use Illuminate\Support\Facades\Route;
use Src\Modules\Blog\Infrastructure\Http\Controllers\Posts\PostShowController;
use Src\Modules\Blog\Infrastructure\Http\Controllers\{IndexController, CategoryController, TagController};

Route::get('/', IndexController::class);
Route::get('/posts/{post}', PostShowController::class)->name('post.show');
Route::get('/categories/{category}', CategoryController::class)->name('post.category');
Route::get('/tags/{tag}', TagController::class)->name('posts.tag');