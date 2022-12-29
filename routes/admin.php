<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\Admin\Tag\TagEditController;
use App\Http\Controllers\Admin\Tag\TagIndexController;
use App\Http\Controllers\Admin\Tag\TagStoreController;
use App\Http\Controllers\Admin\Tag\TagCreateController;
use App\Http\Controllers\Admin\Tag\TagUpdateController;
use App\Http\Controllers\Admin\Tag\TagDestroyController;
use App\Http\Controllers\Admin\Category\CategoryEditController;
use App\Http\Controllers\Admin\Category\CategoryIndexController;
use App\Http\Controllers\Admin\Category\CategoryStoreController;
use App\Http\Controllers\Admin\Category\CategoryCreateController;
use App\Http\Controllers\Admin\Category\CategoryUpdateController;
use App\Http\Controllers\Admin\Category\CategoryDestroyController;

Route::get('/dashboard', [AdminIndexController::class, 'index'])->name('admin.dashboard');

Route::get('/categories', [CategoryIndexController::class, 'index'])->name('admin.category.index');
Route::get('/categories/create', [CategoryCreateController::class, 'create'])->name('admin.category.create');
Route::post('/categories/create', [CategoryStoreController::class, 'store'])->name('admin.category.store');
Route::get('/categories/update/{category}', [CategoryEditController::class, 'edit'])->name('admin.category.edit');
Route::put('/categories/update/{id}', [CategoryUpdateController::class, 'update'])->name('admin.category.update');
Route::delete('/categories/{id}', [CategoryDestroyController::class, 'destroy'])->name('admin.category.destroy');

Route::get('/tags', [TagIndexController::class, 'index'])->name('admin.tag.index');
Route::get('/tags/create', [TagCreateController::class, 'create'])->name('admin.tag.create');
Route::post('/tags/create', [TagStoreController::class, 'store'])->name('admin.tag.store');
Route::get('/tags/update/{tag}', [TagEditController::class, 'edit'])->name('admin.tag.edit');
Route::put('/tags/update/{id}', [TagUpdateController::class, 'update'])->name('admin.tag.update');
Route::delete('/tags/{id}', [TagDestroyController::class, 'destroy'])->name('admin.tag.destroy');
