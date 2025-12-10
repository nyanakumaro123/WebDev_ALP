<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\ColorCategory;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function colorListView(){

        $colors = Color::with('ColorCategory')->get();

        return view('admin.Colorr.listColor', [
            'colors' => $colors
        ]);
    }
    
    public function createFormView(){

        $colorCategories = ColorCategory::all();

        return view('admin.Colorr.createColor', [
            'colorCategories' => $colorCategories
        ]);
    }

    public function updateFormView(){
        return view('admin.Colorr.updateColor');
    }

    public function create(Request $request){
        $request->validate([
            'ColorName'=>'required|string|max:50',
            'ColorCode'=>'required|string|max:50',
            'ColorCategoryID' => 'required|integer|exists:color_categories,id',
        ]);

        // $colorCategory = ColorCategory::all();

        Color::create([
            'ColorName' => $request->ColorName,
            'ColorCode' => $request->ColorCode,
            'ColorCategoryID' => $request->ColorCategoryID
        ]);

        // $color->ColorCategory()->attach($colorCategory->id);

        return redirect()->route('color.list.view');
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
