<?php

use Illuminate\Support\Facades\Route;
use Src\Modules\Blog\Infrastructure\Http\Controllers\IndexController;
use Src\Modules\Blog\Infrastructure\Http\Controllers\Posts\PostShowController;

Route::get('/', IndexController::class);
Route::get('/posts/{post}', PostShowController::class)->name('post.show');