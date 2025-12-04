<?php

namespace App\Http\Controllers;

use App\Models\StockHistory;
use Illuminate\Http\Request;

class StockHistoryController extends Controller
{

    public function create(Request $request){

        $request->validate([
         "ProductID"=>"required|exists:productsid",
            "StockDate"=>"required|date",
            "SupplierID"=>"required|exists:suppliersid",
            "StockQuantity"=>"required|integer",
            "UserID"=>"required|exists:usersid"
        
        ])
        ;
        StockHistory::create([
         "ProductID"=>$request->ProductID,
            "StockDate"=>$request->StockDate,
            "SupplierID"=>$request->SupplierID,
            "StockQuantity"=>$request->StockQuantity,
            "UserID"=>$request->UserID
        ]);

        return response()->json([
            'message'=>'Stock History created successfully'
        ],201);

        return redirect()->route('stockhistory.createview');   


    }

    public function createView(){
        return view('admin.StockHistory.createStockHistory');        
    }

    public function listStockHistories(){
        $stockhistories = StockHistory::all();
        return response()->json([
            'stockhistories'=>$stockhistories,
            'message'=>'Stock Histories Retrieved all'
        ],200);

        return redirect()->route('stockhistories.list.view');
    }

    public function deleteStockHistory($id){
        $stockhistory = StockHistory::find($id);
        if(!$stockhistory){
            return response()->json([
                'message'=>'Stock History not found'
            ],404);
        }
        $stockhistory->delete();
        return response()->json([
            'message'=>'Stock History deleted successfully'
        ],200);
    }

    public function updateStockHistory(Request $request, $id){
        $stockhistory = StockHistory::find($id);
        if(!$stockhistory){
            return response()->json([
                'message'=>'Stock History not found'
            ],404);
        }

        $request->validate([
         "ProductID"=>"required|exists:productsid",
            "StockDate"=>"required|date",
            "SupplierID"=>"required|exists:suppliersid",
            "StockQuantity"=>"required|integer",
            "UserID"=>"required|exists:usersid"
        
        ])
        ;

        $stockhistory->update([
         "ProductID"=>$request->ProductID,
            "StockDate"=>$request->StockDate,
            "SupplierID"=>$request->SupplierID,
            "StockQuantity"=>$request->StockQuantity,
            "UserID"=>$request->UserID
        ]);

        return response()->json([
            'message'=>'Stock History updated successfully'
        ],200);
    }




    //
}
