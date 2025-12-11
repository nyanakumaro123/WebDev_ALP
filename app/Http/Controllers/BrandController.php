<?php

namespace App\Http\Controllers;

use App\Models\Brand;

use Illuminate\Http\Request;

class BrandController extends Controller

{

    function store(Request $request){
        $request->validate([
            // Saya mempertahankan max:20 sesuai dengan validasi Anda
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
            // Mengubah respons JSON ke redirect
            return redirect()->route('brands.list.view')->with('error', 'Brand not found');
        }
        $brand->delete();
        // Mengubah respons JSON ke redirect
        return redirect()->route('brands.list.view')->with('success', 'Brand deleted successfully');
    }

    /**
     * Metode baru untuk menampilkan form update (sesuai brands.update.view)
     * Anda harus mengubah route brands.update.view di web.php ke method ini.
     */
    function editBrand($id){
        $brand = Brand::findOrFail($id);
        // Mengembalikan view dan melewatkan objek $brand
        return view('admin.Brand.updateBrand', compact('brand'));
    }

    /**
     * Metode untuk memproses permintaan PUT (sesuai brands.update)
     */
    function updateBrand(Request $request, $id){
        $brand = Brand::find($id);
        if(!$brand){
            // Mengubah respons JSON ke redirect
            return redirect()->route('brands.list.view')->with('error', 'Brand not found');
        }

        $request->validate([
            // Menggunakan max:20 agar konsisten dengan store()
            'BrandName'=>'required|string|max:20|unique:brands,BrandName,'.$id
        ]);

        $brand->update([
            'BrandName'=>$request->BrandName
        ]);

        // Mengubah respons JSON ke redirect
        return redirect()->route('brands.list.view')->with('success', 'Brand updated successfully');
    }
}