<?php

use App\Http\Controllers\ColorCategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SizeCategoryController;
use App\Http\Controllers\SizeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProductController;


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

    //review routes
    Route::get('/reviews-view', [ReviewController::class, 'createView'])->name('reviews.create.view');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::get('/review-list-view', [ReviewController::class, 'listReview'])->name('reviews.list.view');
    Route::delete('reviews-delete-delete/{id}',[ReviewController::class,'deleteReview'])->name('reviews.delete');
    Route::put('reviews-update/{id}',[ReviewController::class,'updateReview'])->name('reviews.update');
});

Route::middleware('admin')->group(function () {
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
    Route::get('/suppliers-update/{id}', [SupplierController::class, 'updateSupplier'])->name('suppliers.update.view');
    Route::delete('/suppliers-delete/{id}', [SupplierController::class, 'deleteSupplier'])->name('suppliers.delete');



    //stock history routes
    Route::get('/stock-history-view', [StockHistoryController::class, 'createView'])->name('stockhistory.createview');
    Route::post('/stock-history', [StockHistoryController::class, 'create'])->name('stockhistory.create');
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
    
    


    
    //Product Category routes
    Route::get('/product-category-list-view', [ProductCategoryController::class, 'productCategoryListView'])->name('product.category.list.view');
    Route::get('/product-category-create-view', [ProductCategoryController::class, 'createFormView'])->name('product.category.create.view');
    Route::post('/product-category-create', [ProductCategoryController::class, 'create'])->name('create.product.category');
    Route::get('/product-category-update-view/{id}', [ProductCategoryController::class, 'updateFormView'])->name('product.category.update.view');
    Route::put('/product-category-update/{id}', [ProductCategoryController::class, 'update'])->name('update.product.category');
    Route::delete('/product-category-delete/{id}', [ProductCategoryController::class, 'delete'])->name('delete.product.category');

    //Size Category routes
    Route::get('/size-categories-create-view', [SizeCategoryController::class, 'createFormView'])->name('sizes.category.create.view');
    Route::post('/size-categories-create', [SizeCategoryController::class, 'create'])->name('sizes.category.create');
    Route::get('/size-categories-update-view/{id}', [SizeCategoryController::class, 'updateFormView'])->name('sizes.category.update.view');
    Route::put('/size-categories-update/{id}', [SizeCategoryController::class, 'update'])->name('sizes.category.update'); 
    Route::delete('/size-categories-delete/{id}', [SizeCategoryController::class, 'delete'])->name('sizes.category.delete');
    Route::get('/size-category-list-view', [SizeCategoryController::class, 'listSizeCategories'])->name('sizes.category.list.view');
   
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
    // Bagian Size routes yang benar (menggunakan awalan 'sizes.')
Route::get('/size-list-view', [SizeController::class, 'sizeListView'])->name('sizes.list.view');
Route::get('/size-create-view', [SizeController::class, 'createFormView'])->name('sizes.create.view');
Route::post('/size-create', [SizeController::class, 'create'])->name('sizes.create');
Route::get('/size-update-view/{id}', [SizeController::class, 'updateFormView'])->name('sizes.update.view');  
Route::put('/size-update/{id}', [SizeController::class, 'update'])->name('sizes.update');
Route::delete('/size-delete/{id}', [SizeController::class, 'delete'])->name('sizes.delete');


    Route::get('/products-create-view', [ProductController::class, 'createView'])->name('products.create.view');
    Route::post('/products-store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products-list-view', [ProductController::class, 'listProducts'])->name('products.list.view');
    Route::delete('/products-delete/{id}', [ProductController::class, 'deleteProduct'])->name('products.delete');
    Route::put('/products-update/{id}', [ProductController::class, 'updateProduct'])->name('products.update.view');
});

// Route::middleware('admin')->group(function () {
    
    







    

// });


require __DIR__.'/auth.php';
