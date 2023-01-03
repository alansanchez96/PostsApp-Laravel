<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\User\UserEditController;
use App\Http\Controllers\Admin\User\UserIndexController;
use App\Http\Controllers\Admin\User\UserUpdateController;

Route::get('/users', [UserIndexController::class, 'index'])->name('admin.user.index')->middleware('can:admin.user.index');
Route::get('/users/update/{user}', [UserEditController::class, 'edit'])->name('admin.user.edit')->middleware('can:admin.user.edit');
Route::put('/users/update/{user}', [UserUpdateController::class, 'update'])->name('admin.user.update')->middleware('can:admin.user.update');