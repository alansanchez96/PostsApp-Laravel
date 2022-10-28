<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserSettingsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->name('dashboard')->middleware(['auth', 'verified']);

/**
 * Include routes authenticable
 */
require __DIR__ . '/auth.php';

Route::controller(UserController::class)->group(
    function () {
        Route::get('/user/profile', 'profile')->name('user.profile')->middleware(['auth', 'verified']);
        Route::put('/user/profile', 'updateProfile')->name('user.updateProfile')->middleware(['auth', 'verified']);
    }
);
Route::controller(UserSettingsController::class)->group(
    function () {
        Route::get('/user/settings', 'settings')->name('user.settings')->middleware(['auth', 'verified']);
        Route::put('/user/settings', 'updateSettings')->name('user.updateSettings')->middleware(['auth', 'verified']);
    }
);
