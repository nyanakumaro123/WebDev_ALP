<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\SizeCategory;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function sizeListView(){
        return view('admin.Size.listSize');
    }
    
    public function createFormView(){
        return view('admin.Size.createSize', [
            'sizeCategories' => SizeCategory::all()
        ]);
    }

    public function updateFormView(){
        return view('admin.Size.updateSize');
    }

    public function create(Request $request){
        $request->validate([
            'SizeValue'=>'required|string|max:50',
            'SizeCategoryID' => 'required|integer|exists:size_categories,id',
        ]);

        Size::create([
            'SizeValue' => $request->SizeValue,
            'SizeCategoryID' => $request->SizeCategoryID
        ]);

        return redirect()->route('size.list.view');
    }

    // public function update(Request $request, int $id){
    //     $request->validate([
    //         'SizeValue'=>'required|string|max:50',
    //         'SizeCategoryID' => 'required|integer|exists:size_categories,id',
    //     ]);

    //     Size::update([
    //         'SizeValue' => $request->SizeValue,
    //         'SizeCategoryID' => $request->SizeCategoryID
    //     ]);

    //     return redirect()->route('size.category.list.view');
    // }

    // public function delete(int $id){
    //     Size::findOrFail($id)->delete();
    //     return redirect()->route('size.list.view');
    // }
}
