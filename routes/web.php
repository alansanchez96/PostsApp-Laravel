<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Post\ShowController;
use App\Http\Controllers\Post\IndexController;
use App\Http\Controllers\Category\CategoryController;

Route::get('/home', [IndexController::class, '__invoke'])->name('home');

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->name('dashboard')->middleware(['auth', 'verified']);


// Include routes authenticable
require __DIR__ . '/auth.php';

// Route Users
require __DIR__ . '/user.php';

Route::get('/', [IndexController::class, '__invoke'])->name('post.index');
Route::get('/posts/{title}', [ShowController::class, '__invoke'])->name('post.show');

Route::get('/categories/{category}', [CategoryController::class, '__invoke'])->name('post.category');
