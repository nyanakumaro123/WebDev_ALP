<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    function store(Request $request){
        $request->validate([
            'SupplierName' => 'required|string|max:100|unique:suppliers,SupplierName',
            'CompanyName' => 'required|string|max:100', // Diubah dari ContactNumber
        ]);

        Supplier::create([
            'SupplierName' => $request->SupplierName,
            'CompanyName' => $request->CompanyName, // Diubah dari ContactNumber
        ]);

        return redirect()->route('suppliers.list.view')->with('success', 'Supplier created successfully');
    }

    function createForm(){
        return view('admin.Supplier.createSupplier');
    }

    function listSuppliers(){
        $suppliers = Supplier::all();
        
        return view('admin.Supplier.listSupplier', compact('suppliers'));
    }

    function deleteSupplier($id){
        $supplier = Supplier::find($id);
        if(!$supplier){
            return redirect()->route('suppliers.list.view')->with('error', 'Supplier not found');
        }
        $supplier->delete();
        return redirect()->route('suppliers.list.view')->with('success', 'Supplier deleted successfully');
    }

    function editSupplier($id){
        $supplier = Supplier::findOrFail($id);
        return view('admin.Supplier.updateSupplier', compact('supplier'));
    }

    function updateSupplier(Request $request, $id){
        $supplier = Supplier::find($id);
        if(!$supplier){
            return redirect()->route('suppliers.list.view')->with('error', 'Supplier not found');
        }

        $request->validate([
            'SupplierName' => 'required|string|max:100|unique:suppliers,SupplierName,' . $id,
            'CompanyName' => 'required|string|max:100', // Diubah dari ContactNumber
        ]);

        $supplier->update([
            'SupplierName' => $request->SupplierName,
            'CompanyName' => $request->CompanyName, // Diubah dari ContactNumber
        ]);

        return redirect()->route('suppliers.list.view')->with('success', 'Supplier updated successfully');
    }
}