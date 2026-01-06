<?php

namespace App\Http\Controllers;

use App\Models\ColorCategory;
use Illuminate\Http\Request;

class ColorCategoryController extends Controller
{
    public function colorCategoryListView(){
        $colorCategories = ColorCategory::all();
        return view('admin.ColorCategory.listColorCategory', [
            'colorCategories' => $colorCategories
        ]);
    }

    public function createFormView(){
        return view('admin.ColorCategory.createColorCategory');
    }

    public function updateFormView($id){
        $colorCategory = ColorCategory::findOrFail($id);
        return view('admin.ColorCategory.updateColorCategory', [
            'colorCategory' => $colorCategory
        ]);
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

        public function update(Request $request, int $id)
        {
            $request->validate([
                'ColorCategoryName' => 'required|string|max:255',
                'ColorCode'         => 'required|string|max:7', // Validates hex codes like #FFFFFF
            ]);

            $colorCategory = ColorCategory::findOrFail($id);
            
            // Update both the Name and the Code
            $colorCategory->update([
                'ColorCategoryName' => $request->ColorCategoryName,
                'ColorCode'         => $request->ColorCode,
            ]);

            return redirect()->route('color.list.view')->with('success', 'Color Category and Code updated successfully');
        }

    public function delete(int $id){
        $colorCategory = ColorCategory::findOrFail($id);
        $colorCategory->delete();
        return redirect()->route('color.list.view');
    }
}
