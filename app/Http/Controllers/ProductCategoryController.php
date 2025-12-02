<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function createView(){
        return view('admin.createProductCategory');
    }

    public function updateView(){
        return view('admin.updateProductCategory');
    }

    public function create(Request $request){
        $request->validate([
            'ProductCategoryName'=>'required|string|max:50',
        ]);

        ProductCategory::create([
            'ProductCategoryName' => $request->ProductCategoryName
        ]);

        return redirect()->route('product.category.view');
    }
    
    public function update(Request $request, int $id){
        $request->validate([
            'ProductCategoryName'=>'required|string|max:50',
        ]);

        ProductCategory::create([
            'ProductCategoryName' => $request->ProductCategoryName
        ]);

        return redirect()->route('product.category.view');
    }

    public function delete(int $id){
        ProductCategory::findOrFail($id)->delete();
        return redirect()->route('product.category.view');
    }
}
