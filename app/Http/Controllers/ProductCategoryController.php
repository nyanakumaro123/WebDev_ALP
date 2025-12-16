<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 

use App\Models\Product;
use App\Models\Brand;
use App\Models\Supplier;
use App\Models\ProductType;
use App\Models\ProductCategory;

class ProductController extends Controller
{
    /**
     * Menampilkan daftar semua produk.
     */
    public function listProducts()
    {
        // Eager load semua relasi yang dibutuhkan di list view
        $products = Product::with('Brand', 'Supplier', 'ProductType', 'ProductCategory')->get();
        return view('admin.Products.listProducts', compact('products'));
    }
    
    /**
     * Menampilkan form untuk membuat produk baru.
     */
    public function createView()
    {
        // Ambil data untuk dropdown di form
        $brands = Brand::all();
        $suppliers = Supplier::all();
        $productTypes = ProductType::all();
        $productCategories = ProductCategory::all();

        return view('admin.Products.createProducts', compact('brands', 'suppliers', 'productTypes', 'productCategories'));
    }

    /**
     * Menyimpan produk baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ProductName' => 'required|string|max:255',
            'Price' => 'required|numeric|min:0',
            'ProductQuantity' => 'required|integer|min:0',
            'BrandID' => 'required|exists:brands,id',
            'SupplierID' => 'required|exists:suppliers,id', 
            'ProductTypeID' => 'required|exists:product_types,id',
            'ProducCategoryID' => 'required|exists:product_categories,id', 
            'Image' => 'required|image|mimes:jpeg,png,jpg|max:2048', 
        ]);

        // Menangani Unggahan Gambar
        $imagePath = $request->file('Image')->store('public/products');

        Product::create([
            'ProductName' => $request->ProductName,
            'Price' => $request->Price,
            'ProductQuantity' => $request->ProductQuantity,
            'BrandID' => $request->BrandID,
            'SupplierID' => $request->SupplierID,
            'ProductTypeID' => $request->ProductTypeID,
            'ProducCategoryID' => $request->ProducCategoryID,
            'Image' => str_replace('public/', '', $imagePath), 
        ]);
        
        return redirect()->route('products.list.view')->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Menampilkan form untuk mengedit produk.
     */
    public function updateView($id)
    {
        // Ambil produk beserta relasinya
        $product = Product::findOrFail($id);

        // Ambil data untuk dropdown di form
        $brands = Brand::all();
        $suppliers = Supplier::all();
        $productTypes = ProductType::all();
        $productCategories = ProductCategory::all();

        return view('admin.Products.updateProducts', compact('product', 'brands', 'suppliers', 'productTypes', 'productCategories'));
    }
 
    /**
     * Memperbarui produk di database.
     */
    public function updateProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        
        $request->validate([
            'ProductName' => 'required|string|max:255',
            'Price' => 'required|numeric|min:0',
            'ProductQuantity' => 'required|integer|min:0',
            'BrandID' => 'required|exists:brands,id',
            'SupplierID' => 'required|exists:suppliers,id',
            'ProductTypeID' => 'required|exists:product_types,id',
            'ProducCategoryID' => 'required|exists:product_categories,id',
            'Image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Boleh tidak diisi
        ]);
        
        $data = $request->only([
            'ProductName', 'Price', 'ProductQuantity', 'BrandID', 'SupplierID', 'ProductTypeID', 'ProducCategoryID'
        ]);

        // Penanganan Gambar
        if ($request->hasFile('Image')) {
            // Hapus gambar lama jika ada
            if ($product->Image) {
                 Storage::delete('public/' . $product->Image); 
            }
            
            $imagePath = $request->file('Image')->store('public/products');
            $data['Image'] = str_replace('public/', '', $imagePath);
        }

        // Update data
        $product->update($data);
        
        return redirect()->route('products.list.view')->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Menghapus produk dari database.
     */
    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        
        // Hapus gambar dari storage sebelum menghapus record
        if ($product->Image) {
            Storage::delete('public/' . $product->Image);
        }

        $product->delete();
        return redirect()->route('products.list.view')->with('success', 'Produk berhasil dihapus!');
    }
}