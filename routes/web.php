<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\VerifyEmailController;

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
    return view('dashboard');
})->name('dashboard')->middleware(['auth', 'verified']);

/**
 * Guest
 * 
 */
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index')->name('login')->middleware('guest');
    Route::post('/login', 'login')->middleware('guest');
    Route::post('/logout', 'logout')->middleware('auth');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'index')->name('register')->middleware('guest');
    Route::post('/register', 'register')->middleware('guest');
});

Route::controller(PasswordResetController::class)->group(function () {
    Route::get('/forgot-password', 'index')->name('password.forgot')->middleware('guest');
    Route::post('/forgot-password', 'reset')->middleware('guest');
});

Route::controller(NewPasswordController::class)->group(function () {
    Route::get('/reset-password/{token}', 'index')->name('password.reset')->middleware('guest');
    Route::post('/reset-password', 'reset')->name('password.update')->middleware('guest');
});

/**
 * Auth
 */

Route::get('/verify-email', [EmailVerificationController::class, '__invoke'])
    ->name('verification.notice')->middleware('auth');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'send'])
    ->name('verification.send')->middleware(['auth', 'throttle:6,1']);

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    ->name('verification.verify')->middleware(['auth', 'signed', 'throttle:6,1']);
