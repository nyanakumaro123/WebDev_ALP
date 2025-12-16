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

    public function updateFormView(int $id){

        $productCategory = ProductCategory::findOrFail($id);
        return view('admin.ProductCategory.updateProductCategory', [
            'productCategory' => $productCategory
        ]);
    }

    public function create(Request $request){
        $request->validate([
            'ProductCategoryName'=>'required|string|max:255',
        ]);

        ProductCategory::create([
            'ProductCategoryName' => $request->ProductCategoryName
        ]);

        return redirect()->route('product.category.list.view');
    }
    
    public function update(Request $request, int $id){

        $request->validate([
            'ProductCategoryName'=>'required|string|max:255',
        ]);

        $productCategory = ProductCategory::findOrFail($id);
        $productCategory->update([
            'ProductCategoryName' => $request->ProductCategoryName
        ]);

        return redirect()->route('product.category.list.view');
    }

    public function delete(int $id) {

        $productCategory = ProductCategory::findOrFail($id);
        $productCategory->delete();

        return redirect()->route('product.category.list.view');
    }
}
