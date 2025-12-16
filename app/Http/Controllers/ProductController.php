<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Supplier;
use App\Models\ProductType;

class ProductController extends Controller
{

    public function createView(){
        return view('admin.roducts.createProducts');
    }
// App\Http\Controllers\ProductController.php

public function store(Request $request){
    $request->validate([
        'ProductName' => 'required|string|max:255',
        'Price' => 'required|numeric|min:0',
        'ProductQuantity' => 'required|integer|min:0', // Mengganti 'Stock' ke 'ProductQuantity'
        'BrandID' => 'required|exists:brands,id',
        'SupplierID' => 'required|exists:suppliers,id', // SupplierID tetap di controller, tapi tidak di form
        'ProductTypeID' => 'required|exists:product_types,id',
        'ProducCategoryID' => 'required|exists:product_categories,id', // Validasi baru
        'Image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Validasi baru
    ]);

    // Menangani Unggahan Gambar
    $imagePath = $request->file('Image')->store('public/products');

    Product::create([
        'ProductName' => $request->ProductName,
        'Price' => $request->Price,
        'ProductQuantity' => $request->ProductQuantity,
        'BrandID' => $request->BrandID,
        'SupplierID' => $request->SupplierID, // Pastikan field ini ada di form atau Anda berikan nilai default
        'ProductTypeID' => $request->ProductTypeID,
        'ProducCategoryID' => $request->ProducCategoryID, // Field baru
        'Image' => str_replace('public/', '', $imagePath), // Field baru
    ]);
    
    return redirect()->route('products.list.view')->with('success', 'Produk berhasil ditambahkan!');
}
    public function listProducts(){
            $products = Product::with('Brand', 'Supplier', 'ProductType')->get();
            return view('admin.Products.listProducts', compact('products'));

    }

    public function deleteProduct($id){
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.list.view');
    }

 
    public function updateProduct(Request $request, $id){
        $product = Product::findOrFail($id);
        
        // 1. Validasi
        $request->validate([
            'ProductName' => 'required|string|max:255',
            'Price' => 'required|numeric|min:0',
            'ProductQuantity' => 'required|integer|min:0',
            'BrandID' => 'required|exists:brands,id',
            'SupplierID' => 'required|exists:suppliers,id', // Jika Anda masih menggunakan Supplier
            'ProductTypeID' => 'required|exists:product_types,id',
            'ProducCategoryID' => 'required|exists:product_categories,id',
            'Image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Nullable karena boleh tidak mengganti gambar
        ]);
        
        $data = $request->only([
            'ProductName', 'Price', 'ProductQuantity', 'BrandID', 'SupplierID', 'ProductTypeID', 'ProducCategoryID'
        ]);

        // 2. Penanganan Gambar
        if ($request->hasFile('Image')) {
            // Hapus gambar lama jika ada (Optional: tambahkan logic hapus storage lama)
            // Storage::delete('public/products/' . $product->Image); 
            
            $imagePath = $request->file('Image')->store('public/products');
            $data['Image'] = str_replace('public/', '', $imagePath);
        }

        // 3. Update data
        $product->update($data);
        
        return redirect()->route('products.list.view')->with('success', 'Produk berhasil diperbarui!');
    }
}

    //

