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

    public function updateFormView($id){

        $color = Color::findOrFail($id);
        $colorCategories = ColorCategory::all();

        return view('admin.Colorr.updateColor', [
            'color' => $color,
            'colorCategories' => $colorCategories
        ]);
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

    public function update(Request $request, int $id){

        $request->validate([
            'ColorName'=>'required|string|max:50',
            'ColorCategoryID' => 'required|integer|exists:color_categories,id',
        ]);

        $color = Color::findOrFail($id);
        $color->update([
            'ColorName' => $request->ColorName,
            'ColorCategoryID' => $request->ColorCategoryID
        ]);

        return redirect()->route('color.list.view');
    }

    public function delete(int $id){

        $color = Color::findOrFail($id);
        $color->delete();

        return redirect()->route('color.list.view');
    }
}
