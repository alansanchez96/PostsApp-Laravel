<?php

use Illuminate\Support\Facades\Route;
use Src\Posts\Infrastructure\IndexController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->name('dashboard')->middleware(['auth', 'verified']);


// Include routes authenticable
require __DIR__ . '/auth.php';

// Route Users
require __DIR__ . '/user.php';

Route::controller(IndexController::class)->group(
    function () {
        Route::get('/index', '__invoke')->name('post.index');
    }
);
