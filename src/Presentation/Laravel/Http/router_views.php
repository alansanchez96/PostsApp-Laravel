<?php

use Illuminate\Support\Facades\Route;
use Src\Presentation\Laravel\Http\Controllers\Auth\{
    LoginViewController,
    NewPasswordController,
    RegisterViewController,
    PasswordResetController,
    VerifyEmailViewController,
    VerifyCodeViewController,
    UserProfileViewController,
    UserSettingsViewController,
};

Route::middleware('web')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/register', RegisterViewController::class)->name('register');
        Route::get('/login', LoginViewController::class)->name('login');
        Route::get('/forgot-password', PasswordResetController::class)->name('password.forgot');
        Route::get('/reset-password', NewPasswordController::class)->name('password.reset');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/verify-email', VerifyEmailViewController::class)->name('verify.email');
        Route::get('/verify-code', VerifyCodeViewController::class)->name('verify.code');
        Route::get('/user/profile', UserProfileViewController::class)->name('user.profile');
        Route::get('/user/settings', UserSettingsViewController::class)->name('user.settings');
    });
});
