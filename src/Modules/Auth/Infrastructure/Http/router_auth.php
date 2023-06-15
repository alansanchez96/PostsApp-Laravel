<?php

use Illuminate\Support\Facades\Route;
use Src\Modules\Auth\Infrastructure\Http\Controllers\{
    RegisterController,
    VerifyEmailController,
    LoginController,
    LogOutController,
    PasswordResetController,
    UpdateProfileController,
    UpdateSettingsController
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
    Route::middleware('verified')->group(function(){
        Route::put('/user/profile', UpdateProfileController::class)->name('user.updateProfile');
        Route::put('/user/settings', UpdateSettingsController::class)->name('user.updateSettings');
    });
});
