<?php

namespace App\Http\Controllers;

use App\Models\Brand;

use Illuminate\Http\Request;

class BrandController extends Controller
{

    function createBrand(Request $request){
        $request->validate([
            'BrandName'=>'required|string|max:20|unique:brands,BrandName'
        ]);

        $brand = Brand::create([
            'BrandName'=>$request->BrandName
        ]);

        return response()->json([
            'message'=>'Brand created successfully',
            'brand'=>$brand
        ],201);

        return redirect()->route('brands.list');
    }

    function getAllBrands(){
        $brands = Brand::all();
        return response()->json([
            'brands'=>$brands
        ],200);
    }

    function getBrandById($id){
        $brand = Brand::find($id);
        if(!$brand){
            return response()->json([
                'message'=>'Brand not found'
            ],404);
        }
        return response()->json([
            'brand'=>$brand
        ],200);
    }

    function deleteBrand($id){
        $brand = Brand::find($id);
        if(!$brand){
            return response()->json([
                'message'=>'Brand not found'
            ],404);
        }
        $brand->delete();
        return response()->json([
            'message'=>'Brand deleted successfully'
        ],200);
    }

    function updateBrand(Request $request, $id){
        $brand = Brand::find($id);
        if(!$brand){
            return response()->json([
                'message'=>'Brand not found'
            ],404);
        }

        $request->validate([
            'BrandName'=>'required|string|max:255|unique:brands,BrandName,'.$id
        ]);

        $brand->update([
            'BrandName'=>$request->BrandName
        ]);

        return response()->json([
            'message'=>'Brand updated successfully',
            'brand'=>$brand
        ],200);
    }


    //
}
