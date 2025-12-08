<?php

use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SupplierController;

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

    Route::get('/product-category-list-view', [ProductCategoryController::class, 'productCategoryListView'])->name('product.category.list.view');
    Route::get('/product-category-create-view', [ProductCategoryController::class, 'createView'])->name('product.category.create.view');
    Route::post('/product-category-create', [ProductCategoryController::class, 'create'])->name('create.product.category');
    Route::get('/product-category-update-view/{id}', [ProductCategoryController::class, 'updateView'])->name('product.category.update.view');
    Route::put('/product-category-update/{id}', [ProductCategoryController::class, 'update'])->name('update.product.category');
    Route::delete('/product-category-delete/{id}', [ProductCategoryController::class, 'delete'])->name('delete.product.category');

    //Brand routes
    Route::post('/brands', [BrandController::class, 'store'])->name('brands.store');
    Route::get('/brands-createView', [BrandController::class, 'createForm'])->name('brands.create.view');
    Route::get('/brands-list', [BrandController::class, 'listBrands'])->name('brands.list.view');
    Route::get('/brands-update/{id}', [BrandController::class, 'updateBrand'])->name('brands.update.view');
    Route::put('/brands-update/{id}', [BrandController::class, 'updateBrand'])->name('brands.update');
    Route::delete('/brands-delete/{id}', [BrandController::class, 'deleteBrand'])->name('brands.delete');

    //supplier routes
    Route::post('/suppliers',[SupplierController::class,'store'])->name('suppliers.store');
    Route::get('/suppliers-createView',[SupplierController::class,'createForm'])->name('suppliers.create.view');
    Route::get('/suppliers-list',[SupplierController::class,'listSuppliers'])->name("suppliers.list.view");


    //stock history routes
    Route::get('/stock-history-view', [ProductCategoryController::class, 'createStockHistoryView'])->name('stockhistory.createview');
    Route::post('/stock-history', [ProductCategoryController::class, 'createStockHistory'])->name('stockhistory.create');
});

// Route::middleware('admin')->group(function () {
    
    







    

// });


require __DIR__.'/auth.php';
