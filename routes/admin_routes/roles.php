<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Role\RoleEditController;
use App\Http\Controllers\Admin\Role\RoleIndexController;
use App\Http\Controllers\Admin\Role\RoleStoreController;
use App\Http\Controllers\Admin\Role\RoleCreateController;
use App\Http\Controllers\Admin\Role\RoleUpdateController;
use App\Http\Controllers\Admin\Role\RoleDestroyController;

Route::get('roles', [RoleIndexController::class, 'index'])->name('admin.role.index');
Route::get('roles/create', [RoleCreateController::class, 'create'])->name('admin.role.create');
Route::post('roles/create', [RoleStoreController::class, 'store'])->name('admin.role.store');
Route::get('roles/update/{role}', [RoleEditController::class, 'edit'])->name('admin.role.edit');
Route::put('roles/update/{role}', [RoleUpdateController::class, 'update'])->name('admin.role.update');
Route::delete('roles/{role}', [RoleDestroyController::class, 'destroy'])->name('admin.role.destroy');
