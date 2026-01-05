<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 

use App\Models\Product;
use App\Models\Brand;
use App\Models\Supplier;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    public function productCategoryListView(Request $request)
    {
        // 1. Start the query
        $query = ProductCategory::query();

        // 2. Check if there is a search term
        if ($request->filled('search')) {
            $query->where('ProductCategoryName', 'like', '%' . $request->search . '%');
        }

        // 3. Paginate the results (e.g., 10 per page) and keep the search query in links
        $productCategories = $query->paginate(10)->withQueryString();

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

