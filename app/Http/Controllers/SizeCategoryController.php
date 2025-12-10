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

    public function updateFormView()
    {
        return view('admin.SizeCategory.updateSizeCategory');
    }

    public function create(Request $request)
    {
        $request->validate([
            'SizeCategoryName' => 'required|string|max:50',
        ]);

        SizeCategory::create([
            'SizeCategoryName' => $request->SizeCategoryName
        ]);

        return redirect()->route('size.list.view');
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
