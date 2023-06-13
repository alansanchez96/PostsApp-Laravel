<?php

use Illuminate\Support\Facades\Route;
use Src\Modules\Auth\Infrastructure\Http\Controllers\VerifyEmailController;
use Src\Modules\Auth\Infrastructure\Http\Controllers\{RegisterController, LoginController};

Route::middleware('guest')->group(function () {
    Route::post('/login', LoginController::class);
    Route::post('/register', RegisterController::class);
});

Route::middleware('auth')->group(function () {
    Route::post('/verify-email', VerifyEmailController::class);
});
