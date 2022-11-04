<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserInfoController;
use App\Http\Controllers\User\UserSettingsController;

Route::middleware(['auth', 'verified'])->group(function () {

    Route::controller(UserInfoController::class)->group(
        function () {
            Route::get('/user/profile', 'profile')->name('user.profile');
            Route::put('/user/profile', 'update')->name('user.updateProfile');
        }
    );

    Route::controller(UserSettingsController::class)->group(
        function () {
            Route::get('/user/settings', 'settings')->name('user.settings');
            Route::put('/user/settings', 'update')->name('user.updateSettings');
        }
    );
});
