<?php

use App\Http\Controllers\ColorCategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SizeCategoryController;
use App\Http\Controllers\SizeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware('admin')->group(function () {
    //Brand routes
    Route::get('/brands-list', [ProductCategoryController::class, 'listBrands'])->name('brands.list.view');
    Route::get('/brands-createView', [ProductCategoryController::class, 'createView'])->name('brands.create.view');
    Route::post('/brands-create', [ProductCategoryController::class, 'createBrand'])->name('brands.create');
    Route::get('/brands-update/{id}', [ProductCategoryController::class, 'updateBrand'])->name('brands.update.view');
    Route::put('/brands-update/{id}', [ProductCategoryController::class, 'updateBrand'])->name('brands.update');

    //stock history routes
    Route::get('/stock-history-view', [ProductCategoryController::class, 'createStockHistoryView'])->name('stockhistory.createview');
    Route::post('/stock-history', [ProductCategoryController::class, 'createStockHistory'])->name('stockhistory.create');
    
    


    
    //Product Category routes
    Route::get('/product-category-list-view', [ProductCategoryController::class, 'productCategoryListView'])->name('product.category.list.view');
    Route::get('/product-category-create-view', [ProductCategoryController::class, 'createFormView'])->name('product.category.create.view');
    Route::post('/product-category-create', [ProductCategoryController::class, 'create'])->name('create.product.category');
    Route::get('/product-category-update-view/{id}', [ProductCategoryController::class, 'updateFormView'])->name('product.category.update.view');
    Route::put('/product-category-update/{id}', [ProductCategoryController::class, 'update'])->name('update.product.category');
    Route::delete('/product-category-delete/{id}', [ProductCategoryController::class, 'delete'])->name('delete.product.category');

    //Size Category routes
    Route::get('/size-categories-create-view', [SizeCategoryController::class, 'createFormView'])->name('size.category.create.view');
    Route::post('/size-categories-create', [SizeCategoryController::class, 'create'])->name('size.category.create');
    Route::get('/size-categories-update-view/{id}', [SizeCategoryController::class, 'updateFormView'])->name('size.category.update.view');
    Route::put('/size-categories-update/{id}', [SizeCategoryController::class, 'update'])->name('size.category.update'); 
    Route::delete('/size-categories-delete/{id}', [SizeCategoryController::class, 'delete'])->name('size.category.delete');
    
    //Color Category routes
    Route::get('/color-categories-create-view', [ColorCategoryController::class, 'createFormView'])->name('color.category.create.view');
    Route::post('/color-categories-create', [ColorCategoryController::class, 'create'])->name('color.category.create');
    Route::get('/color-categories-update-view/{id}', [ColorCategoryController::class, 'updateFormView'])->name('color.category.update.view');
    Route::put('/color-categories-update/{id}', [ColorCategoryController::class, 'update'])->name('color.category.update'); 
    Route::delete('/color-categories-delete/{id}', [ColorCategoryController::class, 'delete'])->name('color.category.delete');
    
    //Color routes
    Route::get('/color-list-view', [ColorController::class, 'colorListView'])->name('color.list.view');
    Route::get('/color-create-view', [ColorController::class, 'createFormView'])->name('color.create.view');
    Route::post('/color-create', [ColorController::class, 'create'])->name('color.create');
    Route::get('/color-update-view/{id}', [ColorController::class, 'updateFormView'])->name('color.update.view');  
    Route::put('/color-update/{id}', [ColorController::class, 'update'])->name('color.update');
    Route::delete('/color-delete/{id}', [ColorController::class, 'delete'])->name('color.delete');

    //Size routes
    Route::get('/size-list-view', [SizeController::class, 'sizeListView'])->name('size.list.view');
    Route::get('/size-create-view', [SizeController::class, 'createFormView'])->name('size.create.view');
    Route::post('/size-create', [SizeController::class, 'create'])->name('size.create');
    Route::get('/size-update-view/{id}', [SizeController::class, 'updateFormView'])->name('size.update.view');  
    Route::put('/size-update/{id}', [SizeController::class, 'update'])->name('size.update');
    Route::delete('/size-delete/{id}', [SizeController::class, 'delete'])->name('size.delete');






    

});


require __DIR__.'/auth.php';
