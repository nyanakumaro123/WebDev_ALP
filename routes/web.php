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
    Route::get('/product-category-view', [ProductCategoryController::class, 'createView'])->name('product.category.create.view');
    Route::get('/product-category-update', [ProductCategoryController::class, 'updateView'])->name('product.category.update.view');
    Route::post('/product-category-update', [ProductCategoryController::class, 'update'])->name('product.category.update');

});

require __DIR__.'/auth.php';
