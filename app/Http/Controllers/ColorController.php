<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function createFormView(){
        return view('admin.createProductCategory');
    }

    public function updateFormView(){
        return view('admin.updateProductCategory');
    }

    public function create(Request $request){
        $request->validate([
            'ColorName'=>'required|string|max:50',
            'ColorCategoryID' => 'required|integer|exists:color_categories,id',
        ]);

        Color::create([
            'ColorName' => $request->ColorName,
            'ColorCategoryID' => $request->ColorCategoryID
        ]);

        return redirect()->route('color.category.list.view');
    }

    // public function update(Request $request, int $id){
    //     $request->validate([
    //         'ColorName'=>'required|string|max:50',
    //         'ColorCategoryID' => 'required|integer|exists:color_categories,id',
    //     ]);

    //     Color::update([
    //         'ColorName' => $request->ColorName,
    //         'ColorCategoryID' => $request->ColorCategoryID
    //     ]);

    //     return redirect()->route('color.category.list.view');
    // }

    // public function delete(int $id){
    //     ColorCategory::findOrFail($id)->delete();
    //     return redirect()->route('color.category.list.view');
    // }
}
