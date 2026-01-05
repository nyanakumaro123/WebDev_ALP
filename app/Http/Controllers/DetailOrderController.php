<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\DetailOrder;
use App\Models\Product;
use App\Models\Size;
use App\Models\SizeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailOrderController extends Controller
{

    public function createFormView()
    {
        $colors = Color::all();
        $sizes = Size::with('SizeCategory')->get();
        $products = Product::all();

        return view('admin.Order.createOrderDetail', [
            'colors' => $colors,
            'sizes' => $sizes,
            'products' => $products,
        ]);
    }

    public function listDetailOrders()
    {
        // Get all orders that haven't been "finalized" (or just the latest ones)
        $detailOrders = DetailOrder::with(['Products', 'Colors', 'Sizes.SizeCategory'])->latest()->get();
        
        $grandTotal = $detailOrders->sum('FinalPrice');
        
        // Get all IDs in a string like "1,2,3" to pass to the invoice button
        $orderIds = $detailOrders->pluck('id')->implode(',');

        return view('admin.Order.listDetailOrder', compact('detailOrders', 'grandTotal', 'orderIds'));
    }

    public function showInvoice(Request $request)
    {
        // 1. Get the string "1,2,3" from the URL query
        $idsString = $request->query('ids');

        if (!$idsString) {
            return back()->with('error', 'No orders selected for invoice.');
        }

        // 2. Convert string to array [1, 2, 3]
        $idsArray = explode(',', $idsString);

        // 3. Fetch all orders in that list
        $orders = DetailOrder::with(['Products', 'Colors', 'Sizes.SizeCategory'])
                    ->whereIn('id', $idsArray)
                    ->get();

        $grandTotal = $orders->sum('FinalPrice');

        // Use the mass-invoice view we talked about earlier
        return view('admin.Invoice.createInvoice', compact('orders', 'grandTotal'));
    }

    public function create(Request $request)
    {
        // 1. Validation (Matches your StockHistory pattern)
        $request->validate([
            'OrderQuantity' => 'required|integer|min:1',
            'TotalPricePerItem' => 'required|numeric|min:0',
            'FinalPrice' => 'required|numeric|min:0',
            'ProductID' => 'required|exists:products,id',
            'ColorID' => 'required|exists:colors,id',
            'SizeID' => 'required|exists:sizes,id',
        ]);

        // 2. The Logic to find the product and subtract the quantity
        $product = Product::findOrFail($request->ProductID);
        
        // Check if stock is enough (safety check)
        if ($product->ProductQuantity < $request->OrderQuantity) {
            return back()->with('error', 'Stok tidak mencukupi!');
        }

        // 3. Subtract the quantity (The 'Fantastic' part)
        $product->decrement('ProductQuantity', $request->OrderQuantity);

        // 4. Create the DetailOrder record
        $detailOrder = DetailOrder::create([
            'OrderQuantity' => $request->OrderQuantity,
            'TotalPricePerItem' => $request->TotalPricePerItem,
            'FinalPrice' => $request->FinalPrice,
            'CreatedBy' => $request->user()->id, // Differentiates the Admin
        ]);

        // 5. Attach relationships (Matches your many-to-many setup)
        $detailOrder->Products()->attach($request->ProductID);
        $detailOrder->Colors()->attach($request->ColorID);
        $detailOrder->Sizes()->attach($request->SizeID);

        return redirect()->route('detail.order.list.view')->with('success', 'Order processed and stock reduced!');

    }

    public function delete($id)
    {
        // 1. Find the DetailOrder and its linked Product
        // We use with('Products') to get the relationship immediately
        $detailOrder = DetailOrder::with('Products')->findOrFail($id);

        // 2. Find the specific product being "returned" to stock
        $product = $detailOrder->Products->first();

        if ($product) {
            // 3. THE REVERSE MATH (Like StockHistory adding stock)
            // This adds the exact amount of the order back into the ProductQuantity
            $product->increment('ProductQuantity', $detailOrder->OrderQuantity);
        }

        // 4. Delete the order record
        $detailOrder->delete();

        // 5. Redirect back to the card list
        return redirect()->route('detail.order.list.view')->with('success', 'Order cancelled and stock restored!');
    }
}
