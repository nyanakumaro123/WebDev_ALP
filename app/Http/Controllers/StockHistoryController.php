<?php

namespace App\Http\Controllers;

use App\Models\StockHistory;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockHistoryController extends Controller
{
    public function createView()
    {
        // Mengambil data untuk dropdown di form
        $products = Product::all();
        $suppliers = Supplier::all();

        return view('admin.StockHistory.createStockHistory', compact('products', 'suppliers'));        
    }

    public function create(Request $request)
    {
        // FIX: Nama tabel di 'exists' harus benar (products,id bukan productsid)
        $request->validate([
            "ProductID" => "required|exists:products,id",
            "StockDate" => "required|date",
            "SupplierID" => "required|exists:suppliers,id",
            "StockQuantity" => "required|integer|min:1",
        ]);

        StockHistory::create([
            "ProductID" => $request->ProductID,
            "StockDate" => $request->StockDate,
            "SupplierID" => $request->SupplierID,
            "StockQuantity" => $request->StockQuantity,
            "UserID" => Auth::id() // Menggunakan ID user yang sedang login
        ]);

        // FIX: Hapus respons JSON jika ingin menggunakan redirect
        return redirect()->route('stockhistory.list.view')->with('success', 'Riwayat stok berhasil dicatat!');
    }

    public function listStockHistories()
    {
        // Eager load relasi agar bisa menampilkan nama produk dan supplier
        $stockhistories = StockHistory::with(['Product', 'Supplier', 'User'])->get();
        
        return view('admin.StockHistory.listStockHistory', compact('stockhistories'));
    }

    public function deleteStockHistory($id)
    {
        $stockhistory = StockHistory::findOrFail($id);
        $stockhistory->delete();

        return redirect()->route('stockhistory.list.view')->with('success', 'Riwayat stok berhasil dihapus!');
    }
}