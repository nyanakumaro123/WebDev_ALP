<?php

namespace App\Http\Controllers;

use App\Models\ColorCategory;
use Illuminate\Http\Request;

class ColorCategoryController extends Controller
{
    public function createFormView(){
        return view('admin.ColorCategory.createColorCategory');
    }

    public function updateFormView(){
        return view('admin.ColorCategory.updateColorCategory');
    }

    public function create(Request $request){
        $request->validate([
            'ColorCategoryName'=>'required|string|max:50',
        ]);

        ColorCategory::create([
            'ColorCategoryName' => $request->ColorCategoryName
        ]);

        return redirect()->route('color.list.view');
    }

        // public function update(Request $request, int $id){
    //     $request->validate([
    //         'ColorCategoryName'=>'required|string|max:50',
    //     ]);

    //     ColorCategory::update([
    //         'ColorCategoryName' => $request->ColorCategoryName
    //     ]);

    //     return redirect()->route('color.category.list.view');
    // }

    // public function delete(int $id){
    //     ColorCategory::findOrFail($id)->delete();
    //     return redirect()->route('color.category.list.view');
    // }
}
