<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Final Invoice - {{ date('YmdHis') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print { .no-print { display: none; } body { background: white; padding: 0; } }
        .receipt-dotted { border-top: 2px dotted #e5e7eb; }
    </style>
</head>
<body class="bg-gray-100 py-10">
    <div class="max-w-md mx-auto bg-white p-8 shadow-sm font-mono text-sm text-gray-800 border border-gray-200">
        <div class="text-center mb-8">
            <h1 class="text-xl font-bold uppercase">Toko Cahaya Makmur</h1>
            <p>Jl. Banyu Urip No.113, Surabaya</p>
            <p>Telp: 0812-3456-7890</p>
            <div class="receipt-dotted mt-4"></div>
        </div>

        <div class="space-y-4 mb-8">
            @foreach($orders as $order)
                @foreach($order->Products as $product)
                <div class="flex justify-between items-start">
                    <div class="max-w-[70%]">
                        <p class="font-bold">{{ strtoupper($product->ProductName) }}</p>
                        <p class="text-xs text-gray-500">
                            @foreach($order->Colors as $c){{ $c->ColorName }} {{ $c->ColorCode }}@endforeach / 
                            @foreach($order->Sizes as $s){{ $s->SizeValue }} {{ $s->SizeCategory->SizeCategoryName }}@endforeach
                        </p>
                        <p class="text-xs">{{ $order->OrderQuantity }} x {{ number_format($order->TotalPricePerItem, 0, ',', '.') }}</p>
                    </div>
                    <p class="font-bold">Rp{{ number_format($order->FinalPrice, 0, ',', '.') }}</p>
                </div>
                @endforeach
            @endforeach
        </div>

        <div class="receipt-dotted pt-4 space-y-2">
            <div class="flex justify-between font-black text-lg">
                <span>GRAND TOTAL</span>
                <span>Rp {{ number_format($grandTotal, 0, ',', '.') }}</span>
            </div>
            <p class="text-center text-xs mt-6">Items: {{ $orders->sum('OrderQuantity') }}</p>
        </div>

        <div class="text-center mt-10">
            <p>*** THANK YOU ***</p>
            <p class="text-[10px] text-gray-400 mt-2">{{ date('d M Y H:i:s') }}</p>
            
            <div class="no-print mt-8 flex gap-2">
                <button onclick="window.print()" class="flex-1 bg-black text-white py-3 font-bold rounded">PRINT</button>
                <button onclick="window.close()" class="flex-1 border border-gray-300 py-3 font-bold rounded">CLOSE</button>
            </div>
        </div>
    </div>
</body>
</html>