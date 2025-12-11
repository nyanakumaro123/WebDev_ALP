<?php

namespace App\Http\Controllers;

use App\Models\SizeCategory;
use Illuminate\Http\Request;

class SizeCategoryController extends Controller
{
    public function createFormView()
    {
        return view('admin.SizeCategory.createSizeCategory');
    }

    // App\Http\Controllers\SizeCategoryController.php

public function updateFormView($id) // Harus ada parameter $id
{
    $sizeCategory = SizeCategory::findOrFail($id); // Mencari kategori berdasarkan ID
    // Melewatkan objek $sizeCategory ke view
    return view('admin.SizeCategory.updateSizeCategory', compact('sizeCategory'));
}
    public function update(Request $request, int $id)
    {
        $request->validate([
            'SizeCategoryName' => 'required|string|max:50',
        ]);

        $sizeCategory = SizeCategory::findOrFail($id);
        $sizeCategory->update([
            'SizeCategoryName' => $request->SizeCategoryName
        ]);

        return redirect()->route('sizes.category.list.view');
    }

    public function create(Request $request)
    {
        $request->validate([
            'SizeCategoryName' => 'required|string|max:50',
        ]);

        SizeCategory::create([
            'SizeCategoryName' => $request->SizeCategoryName
        ]);

        return redirect()->route('sizes.category.list.view');
    }

    public function delete(int $id)
    {
        SizeCategory::findOrFail($id)->delete();
        return redirect()->route('sizes.category.list.view');
    }


    public function listSizeCategories()
    {
        $sizecategories = SizeCategory::all();
        return view('admin.SizeCategory.listSizeCategory', [
            'sizecategories' => $sizecategories
        ]);
    }

    // public function update(Request $request, int $id)
    // {
    //     $request->validate([
    //         'SizeCategoryName' => 'required|string|max:50',
    //     ]);

    //     SizeCategory::update([
    //         'SizeCategoryName' => $request->SizeCategoryName
    //     ]);

    //     return redirect()->route('size.category.list.view');
    // }

    // public function delete(int $id){
    //     SizeCategory::findOrFail($id)->delete();
    //     return redirect()->route('size.category.list.view');
    // }
}
