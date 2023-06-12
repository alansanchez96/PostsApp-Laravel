<?php

use Illuminate\Support\Facades\Route;
use Src\Modules\Auth\Infrastructure\Http\Controllers\RegisterController;
use Src\Modules\Auth\Infrastructure\Http\Controllers\VerifyEmailController;

Route::middleware('guest')->group(function () {
    Route::post('/register', RegisterController::class);
});

Route::middleware('auth')->group(function () {
    Route::post('/verify-email', VerifyEmailController::class);
});
