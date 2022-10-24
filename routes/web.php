<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetController;

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

/**
 * Rutas para la Autenticación
 * 
 */
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index')->name('login')->middleware('guest');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'index')->name('register')->middleware('guest');
    Route::post('/register', 'register');
});

Route::controller(PasswordResetController::class)->group(function () {
    Route::get('/forgot-password', 'index')->name('password.forgot')->middleware('guest');
    Route::post('/forgot-password', 'reset');
});

Route::controller(NewPasswordController::class)->group(function () {
    Route::get('/reset-password/{token}', 'index')->name('password.reset')->middleware('guest');
});
