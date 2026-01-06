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

    public function listProducts(Request $request)
    {
        // 1. Start a query for products with their relationships
        $query = Product::with(['Brand', 'ProductCategory', 'Colors', 'Sizes.SizeCategory']);

        // 2. Apply search filter if the search input is filled
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('ProductName', 'like', '%' . $searchTerm . '%')
                ->orWhereHas('Brand', function($bq) use ($searchTerm) {
                    $bq->where('BrandName', 'like', '%' . $searchTerm . '%');
                })
                ->orWhereHas('ProductCategory', function($cq) use ($searchTerm) {
                    $cq->where('ProductCategoryName', 'like', '%' . $searchTerm . '%');
                });
            });
        }

        // 3. Get paginated results (e.g., 10 per page) and keep search parameters in links
        $products = $query->paginate(10)->withQueryString();

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
            'SupplierID' => 'required|exists:suppliers,id',
            'ProductCategoryID' => 'required|exists:product_categories,id',
            'Image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            // Tambahkan validasi untuk relasi
            'ColorID' => 'required|exists:colors,id',
            'SizeID' => 'required|exists:sizes,id',
        ]);

        $product = Product::findOrFail($id);

        // Siapkan data untuk update tabel 'products'
        // HAPUS 'ProductSize' dan 'ProductColor' karena kamu pakai tabel relasi
        $dataToUpdate = [
            'ProductName' => $request->ProductName,
            'Price' => $request->Price,
            'ProductQuantity' => $request->ProductQuantity,
            'BrandID' => $request->BrandID,
            'SupplierID' => $request->SupplierID,
            'ProductCategoryID' => $request->ProductCategoryID,
        ];

        // 2. Penanganan Gambar (Menggunakan Storage Facade lebih aman)
        if ($request->hasFile('Image')) {
            // Cek apakah gambar lama ada, jika ada hapus
            if ($product->Image && Storage::disk('public')->exists($product->Image)) {
                Storage::disk('public')->delete($product->Image);
            }
            
            // Upload gambar baru
            $dataToUpdate['Image'] = $request->file('Image')->store('products', 'public');
        }

        // 3. Update Tabel Produk Utama
        $product->update($dataToUpdate);

        // 4. PENTING: Update Relasi Warna dan Size (Many-to-Many)
        // Gunakan sync() untuk mengganti relasi lama dengan yang baru
        $product->Colors()->sync($request->ColorID);
        $product->Sizes()->sync($request->SizeID);

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
    public function shop(Request $request)
    {
        $brands = Brand::all();
        $colors = Color::all();
        $sizes = Size::with('SizeCategory')->get();
        $suppliers = Supplier::all();
        $categories = ProductCategory::all();

        // Start the query with relationships
        $query = Product::with(['Brand', 'ProductCategory', 'Sizes.SizeCategory', 'colors']);

        // 1. Handle Search
        if ($request->filled('search')) {
            $query->where('ProductName', 'like', '%' . $request->search . '%');
        }

        // 2. Handle Category Filtering
        if ($request->filled('category')) {
            $query->whereHas('ProductCategory', function($q) use ($request) {
                $q->where('ProductCategoryName', $request->category);
            });
        }

        // 3. Get paginated results (10 per page as you requested)
        $products = $query->paginate(10);

        return view('user.Product.shop', compact('products', 'categories'));
    }

}

    //
