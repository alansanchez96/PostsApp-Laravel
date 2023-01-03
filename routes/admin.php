<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminIndexController;

Route::get('/dashboard', [AdminIndexController::class, 'index'])->name('admin.dashboard');

require __DIR__ . '/admin_routes/categories.php';
require __DIR__ . '/admin_routes/tags.php';
require __DIR__ . '/admin_routes/posts.php';
require __DIR__ . '/admin_routes/users.php';
require __DIR__ . '/admin_routes/roles.php';
