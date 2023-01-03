<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Tag\TagEditController;
use App\Http\Controllers\Admin\Tag\TagIndexController;
use App\Http\Controllers\Admin\Tag\TagStoreController;
use App\Http\Controllers\Admin\Tag\TagCreateController;
use App\Http\Controllers\Admin\Tag\TagUpdateController;
use App\Http\Controllers\Admin\Tag\TagDestroyController;

Route::get('/tags', [TagIndexController::class, 'index'])->name('admin.tag.index')->middleware('can:admin.tag.index');
Route::get('/tags/create', [TagCreateController::class, 'create'])->name('admin.tag.create')->middleware('can:admin.tag.create');
Route::post('/tags/create', [TagStoreController::class, 'store'])->name('admin.tag.store');
Route::get('/tags/update/{tag}', [TagEditController::class, 'edit'])->name('admin.tag.edit')->middleware('can:admin.tag.edit');
Route::put('/tags/update/{id}', [TagUpdateController::class, 'update'])->name('admin.tag.update');
Route::delete('/tags/{id}', [TagDestroyController::class, 'destroy'])->name('admin.tag.destroy')->middleware('can:admin.tag.destroy');
