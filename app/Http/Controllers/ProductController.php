<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Supplier;
use App\Models\ProductCategory;
use App\Models\Size;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Admin

    public function createView()
    {
        $brands = Brand::all();
        $colors = Color::all();
        $sizes = Size::all();
        $suppliers = Supplier::all();
        $productCategories = ProductCategory::all();

        return view('admin.Products.createProducts', [
            'brands' => $brands,
            'colors' => $colors,
            'sizes' => $sizes,
            'suppliers' => $suppliers,
            'productCategories' => $productCategories,
        ]);
    }
    
    public function updateView(int $id)
    {
        $product = Product::with('Brand', 'Supplier', 'ProductCategory', 'Colors', 'Sizes')->findOrFail($id);

        $brands = Brand::all();
        $colors = Color::all();
        $sizes = Size::all();
        $suppliers = Supplier::all();
        $productCategories = ProductCategory::all();

        return view('admin.Products.updateProducts', [
            'product' => $product,
            'brands' => $brands,
            'colors' => $colors,
            'sizes' => $sizes,
            'suppliers' => $suppliers,
            'productCategories' => $productCategories,
        ]);
    }

    public function listProducts()
    {
        $products = Product::with('Brand', 'Supplier', 'ProductCategory', 'Colors', 'Sizes')->get();
        return view('admin.Products.listProducts', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ProductName' => 'required|string|max:255',
            'Price' => 'required|numeric|min:0',
            'ProductQuantity' => 'required|integer|min:0', // Mengganti 'Stock' ke 'ProductQuantity'
            'Image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Validasi baru
            'BrandID' => 'required|exists:brands,id',
            'ColorID' => 'required|exists:colors,id', // Validasi baru
            'SupplierID' => 'required|exists:suppliers,id', // SupplierID tetap di controller, tapi tidak di form
            'SizeID' => 'required|exists:sizes,id', // Validasi baru
            'ProductCategoryID' => 'required|exists:product_categories,id', // Validasi baru
        ]);

        // Menangani Unggahan Gambar
        $imagePath = $request->file('Image')->store('products', 'public');

        $product = Product::create([
            'ProductName' => $request->ProductName,
            'Price' => $request->Price,
            'ProductQuantity' => $request->ProductQuantity,
            'Image' => $imagePath, // Field baru
            'BrandID' => $request->BrandID,
            'SupplierID' => $request->SupplierID,
            'ProductCategoryID' => $request->ProductCategoryID, // Field baru
        ]);

        $product->Colors()->attach($request->ColorID); // Menyimpan relasi warna
        $product->Sizes()->attach($request->SizeID); // Menyimpan relasi


        return redirect()->route('products.list.view')->with('success', 'Produk berhasil ditambahkan!');
    }


    public function updateProduct(Request $request, $id)
    {
        // 1. Validasi
        $request->validate([
            'ProductName' => 'required|string|max:255',
            'Price' => 'required|numeric|min:0',
            'ProductQuantity' => 'required|integer|min:0',
            'BrandID' => 'required|exists:brands,id',
            'SupplierID' => 'required|exists:suppliers,id', // Jika Anda masih menggunakan Supplier
            'ProductCategoryID' => 'required|exists:product_categories,id',
            'Image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Nullable karena boleh tidak mengganti gambar
        ]);

        $product = Product::findOrFail($id);

        // 2. Penanganan Gambar
        if ($request->file('Image')) {
            unlink('storage/' . $product->Image);
            $product->update([
                'ProductName' => $request->ProductName,
                'ProductSize' => $request->ProductSize,
                'ProductColor' => $request->ProductColor,
                'Price' => $request->Price,
                'ProductQuantity' => $request->ProductQuantity,
                'Image' => $request->file('Image')->store('products', 'public'),
                'BrandID' => $request->BrandID,
                'SupplierID' => $request->SupplierID,
                'ProductCategoryID' => $request->ProductCategoryID,
            ]);
        } else {
            $product->update([
                'ProductName' => $request->ProductName,
                'ProductSize' => $request->ProductSize,
                'ProductColor' => $request->ProductColor,
                'Price' => $request->Price,
                'ProductQuantity' => $request->ProductQuantity,
                'BrandID' => $request->BrandID,
                'ProductCategoryID' => $request->ProductCategoryID,
            ]);
        }

        return redirect()->route('products.list.view')->with('success', 'Produk berhasil diperbarui!');
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);

        if (Storage::disk('public')->exists($product->Image)) {
            Storage::disk('public')->delete($product->Image);
        }

        $product->delete();

        return redirect()->route('products.list.view');
    }


    // User
    public function shop()
    {
        // We use paginate(10) to trigger pagination after 10 items
        $products = Product::with(['Brand', 'ProductCategory', 'Colors', 'Sizes', 'Supplier'])->paginate(10);
        $brands = Brand::all();
        $colors = Color::all();
        $sizes = Size::with('SizeCategory')->get();
        $suppliers = Supplier::all();
        $productCategories = ProductCategory::all();

        return view('user.Product.shop', compact('products', 'brands', 'colors', 'sizes', 'suppliers', 'productCategories'));
    }

    //     public function show($id)
    //     {
    //         $product = Product::with(['Brand', 'ProductCategory', 'Colors', 'Sizes'])->findOrFail($id);
    //         return view('products.show', compact('product'));
    // }
}

    //
