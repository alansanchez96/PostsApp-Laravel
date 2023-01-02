<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\Admin\Tag\TagEditController;
use App\Http\Controllers\Admin\Tag\TagIndexController;
use App\Http\Controllers\Admin\Tag\TagStoreController;
use App\Http\Controllers\Admin\Post\PostEditController;
use App\Http\Controllers\Admin\Role\RoleEditController;
use App\Http\Controllers\Admin\Tag\TagCreateController;
use App\Http\Controllers\Admin\Tag\TagUpdateController;
use App\Http\Controllers\Admin\User\UserEditController;
use App\Http\Controllers\Admin\Post\PostIndexController;
use App\Http\Controllers\Admin\Post\PostStoreController;
use App\Http\Controllers\Admin\Role\RoleIndexController;
use App\Http\Controllers\Admin\Role\RoleStoreController;
use App\Http\Controllers\Admin\Tag\TagDestroyController;
use App\Http\Controllers\Admin\User\UserIndexController;
use App\Http\Controllers\Admin\Post\PostCreateController;
use App\Http\Controllers\Admin\Post\PostUpdateController;
use App\Http\Controllers\Admin\Role\RoleCreateController;
use App\Http\Controllers\Admin\Role\RoleUpdateController;
use App\Http\Controllers\Admin\User\UserUpdateController;
use App\Http\Controllers\Admin\Post\PostDestroyController;
use App\Http\Controllers\Admin\Role\RoleDestroyController;
use App\Http\Controllers\Admin\Category\CategoryEditController;
use App\Http\Controllers\Admin\Category\CategoryIndexController;
use App\Http\Controllers\Admin\Category\CategoryStoreController;
use App\Http\Controllers\Admin\Category\CategoryCreateController;
use App\Http\Controllers\Admin\Category\CategoryUpdateController;
use App\Http\Controllers\Admin\Category\CategoryDestroyController;

Route::get('/dashboard', [AdminIndexController::class, 'index'])->name('admin.dashboard');

Route::get('/categories', [CategoryIndexController::class, 'index'])->name('admin.category.index')->middleware('can:admin.category.index');
Route::get('/categories/create', [CategoryCreateController::class, 'create'])->name('admin.category.create')->middleware('can:admin.category.create');
Route::post('/categories/create', [CategoryStoreController::class, 'store'])->name('admin.category.store');
Route::get('/categories/update/{category}', [CategoryEditController::class, 'edit'])->name('admin.category.edit')->middleware('can:admin.category.edit');
Route::put('/categories/update/{id}', [CategoryUpdateController::class, 'update'])->name('admin.category.update');
Route::delete('/categories/{id}', [CategoryDestroyController::class, 'destroy'])->name('admin.category.destroy')->middleware('can:admin.category.destroy');

Route::get('/tags', [TagIndexController::class, 'index'])->name('admin.tag.index')->middleware('can:admin.tag.index');
Route::get('/tags/create', [TagCreateController::class, 'create'])->name('admin.tag.create')->middleware('can:admin.tag.create');
Route::post('/tags/create', [TagStoreController::class, 'store'])->name('admin.tag.store');
Route::get('/tags/update/{tag}', [TagEditController::class, 'edit'])->name('admin.tag.edit')->middleware('can:admin.tag.edit');
Route::put('/tags/update/{id}', [TagUpdateController::class, 'update'])->name('admin.tag.update');
Route::delete('/tags/{id}', [TagDestroyController::class, 'destroy'])->name('admin.tag.destroy')->middleware('can:admin.tag.destroy');

Route::get('/posts', [PostIndexController::class, 'index'])->name('admin.post.index')->middleware('can:admin.post.index');
Route::get('/posts/create', [PostCreateController::class, 'create'])->name('admin.post.create')->middleware('can:admin.post.create');
Route::post('/posts/create', [PostStoreController::class, 'store'])->name('admin.post.store');
Route::get('/posts/update/{post}', [PostEditController::class, 'edit'])->name('admin.post.edit')->middleware('can:admin.post.edit');
Route::put('/posts/update/{id}', [PostUpdateController::class, 'update'])->name('admin.post.update');
Route::delete('/posts/{id}', [PostDestroyController::class, 'destroy'])->name('admin.post.destroy')->middleware('can:admin.post.destroy');

Route::get('/users', [UserIndexController::class, 'index'])->name('admin.user.index')->middleware('can:admin.user.index');
Route::get('/users/update/{user}', [UserEditController::class, 'edit'])->name('admin.user.edit')->middleware('can:admin.user.edit');
Route::put('/users/update/{user}', [UserUpdateController::class, 'update'])->name('admin.user.update')->middleware('can:admin.user.update');

Route::get('roles', [RoleIndexController::class, 'index'])->name('admin.role.index');
Route::get('roles/create', [RoleCreateController::class, 'create'])->name('admin.role.create');
Route::post('roles/create', [RoleStoreController::class, 'store'])->name('admin.role.store');
Route::get('roles/update/{role}', [RoleEditController::class, 'edit'])->name('admin.role.edit');
Route::put('roles/update/{role}', [RoleUpdateController::class, 'update'])->name('admin.role.update');
Route::delete('roles/{role}', [RoleDestroyController::class, 'destroy'])->name('admin.role.destroy');
