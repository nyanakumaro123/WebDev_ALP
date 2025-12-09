<?php

namespace App\Http\Controllers;
use App\Models\Supplier;

use Illuminate\Http\Request;

class SupplierController extends Controller
{

    public function createForm(){
        return view('admin.Supplier.createSupplier');

    }

    public function store(Request $request){

        $request->validate([
            'SupplierName' => 'required|string|max:255',
            'CompanyName' => 'required|string|max:255',
        ]);

        Supplier::create([
            'SupplierName' => $request->SupplierName,
            'CompanyName' => $request->CompanyName,
        ]);
        return redirect()->route('suppliers.list.view');
        

    }

    public function listSuppliers(){
        $suppliers = Supplier::all();
        return view('admin.Supplier.listSupplier', [
            'suppliers' => $suppliers
        ]);
    }
    //
}
