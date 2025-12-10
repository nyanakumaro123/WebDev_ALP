<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{

    public function createView(){
        return view('admin.invoices.createInvoices');
    }

    public function store(Request $request){
        $request->validate([
            'InvoiceNumber' => 'required|string|max:255',
            'CustomerName' => 'required|string|max:255',
            'TotalAmount' => 'required|numeric|min:0',
            'InvoiceDate' => 'required|date',
        ]);

        Invoice::create([
            'InvoiceNumber' => $request->InvoiceNumber,
            'CustomerName' => $request->CustomerName,
            'TotalAmount' => $request->TotalAmount,
            'InvoiceDate' => $request->InvoiceDate,
        ]);

        return redirect()->route('invoices.list.view')->with('success', 'Invoice berhasil ditambahkan!');
    }
    
    //
}
