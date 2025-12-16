<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function productCategoryListView(){
        $productCategories = ProductCategory::all();
        return view('admin.ProductCategory.listProductCategory', [
            'productCategories' => $productCategories
        ]);
    }

    public function createFormView(){
        return view('admin.ProductCategory.createProductCategory');
    }

    // FIX: Menerima $id dan mengambil data untuk form edit
    public function updateFormView(int $id){
        $productCategory = ProductCategory::findOrFail($id);
        return view('admin.ProductCategory.updateProductCategory', compact('productCategory'));
    }

    public function create(Request $request){
        $request->validate([
            'ProductCategoryName'=>'required|string|max:50|unique:product_categories,ProductCategoryName',
        ]);

        ProductCategory::create([
            'ProductCategoryName' => $request->ProductCategoryName
        ]);

        return redirect()->route('product.category.list.view')->with('success', 'Kategori produk berhasil ditambahkan!');
    }
    
    // FIX: Metode Update yang benar
    public function update(Request $request, int $id){
        $productCategory = ProductCategory::findOrFail($id);
        
        $request->validate([
            // Tambahkan pengecualian ID saat validasi unique
            'ProductCategoryName'=>'required|string|max:50|unique:product_categories,ProductCategoryName,'.$id,
        ]);

        $productCategory->update([
            'ProductCategoryName' => $request->ProductCategoryName
        ]);

        return redirect()->route('product.category.list.view')->with('success', 'Kategori produk berhasil diperbarui!');
    }

    // FIX: Metode Delete
    public function delete(int $id){
        ProductCategory::findOrFail($id)->delete();
        return redirect()->route('product.category.list.view')->with('success', 'Kategori produk berhasil dihapus!');
    }
}