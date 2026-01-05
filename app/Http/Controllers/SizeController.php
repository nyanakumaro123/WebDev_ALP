<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\SizeCategory;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Menampilkan daftar semua ukuran.
     */
    public function sizeListView(Request $request){
        // 1. Start the query with the SizeCategory relationship
        $query = Size::with('SizeCategory');

        // 2. Apply search filter if the search input is filled
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('SizeValue', 'like', '%' . $searchTerm . '%')
                ->orWhereHas('SizeCategory', function($cq) use ($searchTerm) {
                    $cq->where('SizeCategoryName', 'like', '%' . $searchTerm . '%');
                });
            });
        }

        // 3. Use paginate() instead of get() or all()
        // withQueryString() ensures the search term stays in the URL when changing pages
        $sizes = $query->paginate(10)->withQueryString();

        return view('admin.Size.listSize', compact('sizes'));
    }
    
    /**
     * Menampilkan form untuk membuat ukuran baru.
     */
    public function createFormView(){
        // Ambil semua kategori ukuran untuk dropdown
        $sizeCategories = SizeCategory::all();

        return view('admin.Size.createSize', [
            'sizeCategories' => $sizeCategories
        ]);
    }

    /**
     * Menampilkan form untuk mengedit ukuran tertentu.
     */
    public function updateFormView(int $id){
        // MENCARI UKURAN YANG AKAN DIEDIT
        $size = Size::findOrFail($id);
        
        // Ambil semua kategori ukuran untuk dropdown
        $sizeCategories = SizeCategory::all();

        return view('admin.Size.updateSize', [
            'size' => $size,
            'sizeCategories' => $sizeCategories
        ]);
    }

    /**
     * Menyimpan ukuran baru ke database.
     */
    public function create(Request $request){
        $request->validate([
            'SizeValue'=>'required|string|max:50',
            'SizeCategoryID' => 'required|integer|exists:size_categories,id',
        ]);

        Size::create([
            'SizeValue' => $request->SizeValue,
            'SizeCategoryID' => $request->SizeCategoryID
        ]);

        return redirect()->route('sizes.list.view')->with('success', 'Ukuran berhasil ditambahkan!');
    }


    /**
     * Memperbarui ukuran tertentu di database.
     */
    public function update(Request $request, int $id){
        // MENCARI INSTANCE MODEL UNTUK DIUPDATE
        $size = Size::findOrFail($id);
        
        $request->validate([
            'SizeValue'=>'required|string|max:50',
            'SizeCategoryID' => 'required|integer|exists:size_categories,id',
        ]);

        // MENGGUNAKAN $size->update() BUKAN Size::update()
        $size->update([
            'SizeValue' => $request->SizeValue,
            'SizeCategoryID' => $request->SizeCategoryID
        ]);

        return redirect()->route('sizes.list.view')->with('success', 'Ukuran berhasil diperbarui!');
    }

    /**
     * Menghapus ukuran tertentu dari database.
     */
    public function delete(int $id){
        Size::findOrFail($id)->delete();
        // Redirect yang benar ke daftar ukuran
        return redirect()->route('sizes.list.view')->with('success', 'Ukuran berhasil dihapus!');
    }
}