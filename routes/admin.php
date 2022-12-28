<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminIndexController;

Route::get('/', [AdminIndexController::class, 'index'])->name('admin.index');
