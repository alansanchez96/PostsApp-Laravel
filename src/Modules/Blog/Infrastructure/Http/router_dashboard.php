<?php

use Illuminate\Support\Facades\Route;
use Src\Modules\Blog\Infrastructure\Http\Controllers\Dashboard\DashboardController;
use Src\Modules\Blog\Infrastructure\Http\Controllers\Dashboard\Tag\{TagIndexController, TagCreateController, TagStoreController, TagEditController, TagUpdateController, TagDestroyController};
use Src\Modules\Blog\Infrastructure\Http\Controllers\Dashboard\Post\{PostIndexController, PostCreateController, PostStoreController, PostEditController, PostDestroyController, PostUpdateController};
use Src\Modules\Blog\Infrastructure\Http\Controllers\Dashboard\Role\{RoleIndexController, RoleCreateController, RoleStoreController, RoleEditController, RoleUpdateController, RoleDestroyController};
use Src\Modules\Blog\Infrastructure\Http\Controllers\Dashboard\User\{UserIndexController, UserEditController, UserUpdateController};
use Src\Modules\Blog\Infrastructure\Http\Controllers\Dashboard\Category\{CategoryIndexController, CategoryCreateController, CategoryStoreController, CategoryEditController, CategoryUpdateController, CategoryDestroyController};

Route::middleware('web')->prefix('/dashboard')->group(function () {
    Route::get('/',                             DashboardController::class)->name('admin.dashboard');

    // Users
    Route::get('/users',                        UserIndexController::class)->name('admin.user.index')->middleware('can:admin.user.index');
    Route::get('/users/update/{user}',          UserEditController::class)->name('admin.user.edit')->middleware('can:admin.user.edit');
    Route::put('/users/update/{user}',          UserUpdateController::class)->name('admin.user.update')->middleware('can:admin.user.update');

    // Roles
    Route::get('/roles',                        RoleIndexController::class)->name('admin.role.index');
    Route::get('roles/create',                  RoleCreateController::class)->name('admin.role.create');
    Route::post('roles/create',                 RoleStoreController::class)->name('admin.role.store');
    Route::get('roles/update/{role}',           RoleEditController::class)->name('admin.role.edit');
    Route::put('roles/update/{role}',           RoleUpdateController::class)->name('admin.role.update');
    Route::delete('roles/{role}',               RoleDestroyController::class)->name('admin.role.destroy');

    // Category
    Route::get('/categories',                   CategoryIndexController::class)->name('admin.category.index')->middleware('can:admin.category.index');
    Route::get('/categories/create',            CategoryCreateController::class)->name('admin.category.create')->middleware('can:admin.category.create');
    Route::post('/categories/create',           CategoryStoreController::class)->name('admin.category.store');
    Route::get('/categories/update/{category}', CategoryEditController::class)->name('admin.category.edit')->middleware('can:admin.category.edit');
    Route::put('/categories/update/{id}',       CategoryUpdateController::class)->name('admin.category.update');
    Route::delete('/categories/{id}',           CategoryDestroyController::class)->name('admin.category.destroy')->middleware('can:admin.category.destroy');
    
    // Tag
    Route::get('/tags',                         TagIndexController::class)->name('admin.tag.index')->middleware('can:admin.tag.index');
    Route::get('/tags/create',                  TagCreateController::class)->name('admin.tag.create')->middleware('can:admin.tag.create');
    Route::post('/tags/create',                 TagStoreController::class)->name('admin.tag.store');
    Route::get('/tags/update/{tag}',            TagEditController::class)->name('admin.tag.edit')->middleware('can:admin.tag.edit');
    Route::put('/tags/update/{id}',             TagUpdateController::class)->name('admin.tag.update');
    Route::delete('/tags/{id}',                 TagDestroyController::class)->name('admin.tag.destroy')->middleware('can:admin.tag.destroy');

    // Post
    Route::get('/posts',                        PostIndexController::class)->name('admin.post.index')->middleware('can:admin.post.index');
    Route::get('/posts/create',                 PostCreateController::class)->name('admin.post.create')->middleware('can:admin.post.create');
    Route::post('/posts/create',                PostStoreController::class)->name('admin.post.store');
    Route::get('/posts/update/{post}',          PostEditController::class)->name('admin.post.edit')->middleware('can:admin.post.edit');
    Route::put('/posts/update/{id}',            PostUpdateController::class)->name('admin.post.update');
    Route::delete('/posts/{id}',                PostDestroyController::class)->name('admin.post.destroy')->middleware('can:admin.post.destroy');
});
