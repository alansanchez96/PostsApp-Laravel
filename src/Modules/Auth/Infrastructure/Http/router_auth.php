<?php

use Illuminate\Support\Facades\Route;
use Src\Modules\Auth\Infrastructure\Http\Controllers\VerifyEmailController;
use Src\Modules\Auth\Infrastructure\Http\Controllers\{
    RegisterController,
    LoginController,
    LogOutController,
    PasswordResetController,
};

Route::middleware('guest')->group(function () {
    Route::post('/login', LoginController::class);
    Route::post('/register', RegisterController::class);
    Route::post('/forgot-password', PasswordResetController::class);
    Route::post('/reset-password', NewPasswordController::class)->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', LogOutController::class);
    Route::post('/verify-email', VerifyEmailController::class)->name('verification.verify');
});
