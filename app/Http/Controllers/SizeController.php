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
    public function sizeListView(){
        // Eager load SizeCategory untuk mencegah N+1 Query
        $sizes = Size::with('SizeCategory')->get();
        
        return view('admin.Size.listSize', [
            'sizes' => $sizes
        ]);
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