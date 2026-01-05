<?php

namespace App\Http\Controllers;

use App\Models\SizeCategory;
use Illuminate\Http\Request;

class SizeCategoryController extends Controller
{
    // Menggunakan route name: size.category.list.view
    public function listSizeCategories()
    {
        $sizecategories = SizeCategory::all();
        return view('admin.SizeCategory.listSizeCategory', [
            'sizecategories' => $sizecategories
        ]);
    }
    
    // Menggunakan route name: size.category.create.view
    public function createFormView()
    {
        return view('admin.SizeCategory.createSizeCategory');
    }

    // Menggunakan route name: size.category.update.view
    public function updateFormView($id) 
    {
        $sizeCategory = SizeCategory::findOrFail($id); 
        return view('admin.SizeCategory.updateSizeCategory', compact('sizeCategory'));
    }

    public function create(Request $request)
    {
        $request->validate([
            // Tambahkan validasi unique
            'SizeCategoryName' => 'required|string|max:50|unique:size_categories,SizeCategoryName',
        ]);

        SizeCategory::create([
            'SizeCategoryName' => $request->SizeCategoryName
        ]);

        return redirect()->route('sizes.list.view')->with('success', 'Kategori ukuran berhasil ditambahkan!');
    }

    public function update(Request $request, int $id)
    {
        $sizeCategory = SizeCategory::findOrFail($id);
        
        $request->validate([
            // Tambahkan validasi unique dengan pengecualian ID saat ini
            'SizeCategoryName' => 'required|string|max:50|unique:size_categories,SizeCategoryName,' . $id,
        ]);

        $sizeCategory->update([
            'SizeCategoryName' => $request->SizeCategoryName
        ]);

        return redirect()->route('size.category.list.view')->with('success', 'Kategori ukuran berhasil diperbarui!');
    }

    public function delete(int $id)
    {
        SizeCategory::findOrFail($id)->delete();
        return redirect()->route('size.category.list.view')->with('success', 'Kategori ukuran berhasil dihapus!');
    }
}