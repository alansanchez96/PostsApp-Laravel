<?php

use App\Http\Controllers\Post\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserInfoController;
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


// Include routes authenticable
require __DIR__ . '/auth.php';

// Route Users
require __DIR__ . '/user.php';

Route::controller(PostController::class)->group(
    function () {
        Route::get('/index', 'index')->name('post.index');
    }
);
