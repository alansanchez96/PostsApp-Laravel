<?php

use Illuminate\Support\Facades\Route;
use Src\Modules\Auth\Infrastructure\Http\Controllers\{
    RegisterController,
    VerifyCodeController,
    SendEmailCodeController,
    LoginController,
    LogOutController,
    PasswordResetController,
    NewPasswordController,
    UpdateProfileController,
    UpdateSettingsController
};

Route::middleware('web')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::post('/login', LoginController::class);
        Route::post('/register', RegisterController::class);
        Route::post('/forgot-password', PasswordResetController::class);
        Route::post('/reset-password', NewPasswordController::class)->name('password.update');
    });

    Route::middleware('auth')->group(function () {
        Route::post('/logout', LogOutController::class)->name('logout');
        Route::post('/verify-code', VerifyCodeController::class)->name('verification.code');
        Route::post('/verify-email', SendEmailCodeController::class)->name('verification.send');
        Route::middleware('verified')->group(function () {
            Route::put('/user/profile', UpdateProfileController::class)->name('user.updateProfile');
            Route::put('/user/settings', UpdateSettingsController::class)->name('user.updateSettings');
        });
    });
});
