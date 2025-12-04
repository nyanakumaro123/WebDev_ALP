<?php

use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('admin')->group(function () {
    Route::get('/product-category-list-view', [ProductCategoryController::class, 'productCategoryListView'])->name('product.category.list.view');
    Route::get('/product-category-create-view', [ProductCategoryController::class, 'createView'])->name('product.category.create.view');
    Route::post('/product-category-create', [ProductCategoryController::class, 'create'])->name('create.product.category');
    Route::get('/product-category-update-view/{id}', [ProductCategoryController::class, 'updateView'])->name('product.category.update.view');
    Route::put('/product-category-update/{id}', [ProductCategoryController::class, 'update'])->name('update.product.category');
    Route::delete('/product-category-delete/{id}', [ProductCategoryController::class, 'delete'])->name('delete.product.category');

});

require __DIR__.'/auth.php';
