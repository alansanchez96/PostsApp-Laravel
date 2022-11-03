<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserInfoController;
use App\Http\Controllers\User\UserSettingsController;

Route::controller(UserInfoController::class)->group(
    function () {
        Route::get('/user/profile', 'profile')->name('user.profile')->middleware(['auth', 'verified']);
        Route::put('/user/profile', 'update')->name('user.updateProfile')->middleware(['auth', 'verified']);
    }
);
Route::controller(UserSettingsController::class)->group(
    function () {
        Route::get('/user/settings', 'settings')->name('user.settings')->middleware(['auth', 'verified']);
        Route::put('/user/settings', 'update')->name('user.updateSettings')->middleware(['auth', 'verified']);
    }
);
