<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Post\PostEditController;
use App\Http\Controllers\Admin\Post\PostIndexController;
use App\Http\Controllers\Admin\Post\PostStoreController;
use App\Http\Controllers\Admin\Post\PostCreateController;
use App\Http\Controllers\Admin\Post\PostUpdateController;
use App\Http\Controllers\Admin\Post\PostDestroyController;

Route::get('/posts', [PostIndexController::class, 'index'])->name('admin.post.index')->middleware('can:admin.post.index');
Route::get('/posts/create', [PostCreateController::class, 'create'])->name('admin.post.create')->middleware('can:admin.post.create');
Route::post('/posts/create', [PostStoreController::class, 'store'])->name('admin.post.store');
Route::get('/posts/update/{post}', [PostEditController::class, 'edit'])->name('admin.post.edit')->middleware('can:admin.post.edit');
Route::put('/posts/update/{id}', [PostUpdateController::class, 'update'])->name('admin.post.update');
Route::delete('/posts/{id}', [PostDestroyController::class, 'destroy'])->name('admin.post.destroy')->middleware('can:admin.post.destroy');