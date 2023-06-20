<?php

use Illuminate\Support\Facades\Route;
use Src\Presentation\Laravel\Http\Controllers\Auth\{
    LoginViewController,
    RegisterViewController,
    VerifyEmailViewController,
};


Route::middleware('guest')->group(function () {
    Route::get('/register', RegisterViewController::class)->name('register');
    Route::get('/login', LoginViewController::class)->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/verify-email', VerifyEmailViewController::class)->name('verify.email');
});
