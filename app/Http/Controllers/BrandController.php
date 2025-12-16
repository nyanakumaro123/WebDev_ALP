<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    function store(Request $request){
        $request->validate([
            'BrandName'=>'required|string|max:20|unique:brands,BrandName'
        ]);

        Brand::create([
            'BrandName'=>$request->BrandName
        ]);

        return redirect()->route('brands.list.view')->with('success', 'Brand created successfully');
    }

    function createForm(){
        return view('admin.Brand.createBrand');
    }


    function listBrands(){
        $brands = Brand::all();
        
        return view('admin.Brand.listBrand', [
            'brands' => $brands
        ]);
    }

    function deleteBrand($id){
        $brand = Brand::find($id);
        if(!$brand){
            return redirect()->route('brands.list.view')->with('error', 'Brand not found');
        }
        $brand->delete();
        return redirect()->route('brands.list.view')->with('success', 'Brand deleted successfully');
    }

    /**
     * Menampilkan form update brand.
     */
    function editBrand($id){
        $brand = Brand::findOrFail($id);
        return view('admin.Brand.updateBrand', compact('brand'));
    }

    /**
     * Memproses permintaan PUT untuk update brand.
     */
    function updateBrand(Request $request, $id){
        $brand = Brand::find($id);
        if(!$brand){
            return redirect()->route('brands.list.view')->with('error', 'Brand not found');
        }

        $request->validate([
            'BrandName'=>'required|string|max:20|unique:brands,BrandName,'.$id
        ]);

        $brand->update([
            'BrandName'=>$request->BrandName
        ]);

        return redirect()->route('brands.list.view')->with('success', 'Brand updated successfully');
    }
}