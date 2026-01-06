<x-admin-app-layout>
    <div class="max-w-4xl mx-auto">
        <div class="receipt-paper p-8">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800">New Order Detail</h1>
                <p class="text-gray-500">Create a new transaction entry</p>
            </div>

            <form action="{{ route('detail.order.create') }}" method="POST" id="pos-form" enctype="multipart/form-data">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Select Product</label>
                            <select name="ProductID" id="product_id" class="w-full border-2 border-gray-200 rounded-lg p-3 focus:border-gray-500 outline-none transition" required>
                                <option value="" data-price="0">-- Choose Product --</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" data-price="{{ $product->Price }}" data-stock="{{ $product->ProductQuantity }}">
                                        {{ $product->ProductName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Color</label>
                            <select name="ColorID" class="w-full border-2 border-gray-200 rounded-lg p-3 outline-none focus:border-gray-500" required>
                                @foreach($colors as $color)
                                    <option value="{{ $color->id }}">{{ $color->ColorName }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Size</label>
                            <select name="SizeID" class="w-full border-2 border-gray-200 rounded-lg p-3 outline-none focus:border-gray-500" required>
                                @foreach($sizes as $size)
                                    <option value="{{ $size->id }}">
                                        {{ $size->SizeValue }} {{ $size->SizeCategory->SizeCategoryName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 space-y-4">
                        <div>
                            <div class="flex justify-between mb-2">
                                <label class="block text-sm font-semibold text-gray-700">Quantity</label>
                                <span id="stock-count" class="text-xs font-bold text-green-600"></span>
                            </div>
                            <input type="number" name="OrderQuantity" id="order_quantity" min="1" value="1" 
                                class="w-full border-2 border-gray-200 rounded-lg p-3 outline-none focus:border-gray-500" required>
                            <p id="stock-error" class="text-red-500 text-xs mt-1 hidden font-bold">Exceeds available stock!</p>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Price Per Unit</label>
                            <input type="number" name="TotalPricePerItem" id="unit_price" readonly 
                                   class="w-full bg-gray-200 border-none rounded-lg p-3 text-gray-600 font-mono">
                        </div>

                        <div class="pt-4 receipt-line"></div>

                        <div class="pt-4">
                            <span class="text-gray-500 text-sm uppercase tracking-wider">Total Amount</span>
                            <div class="text-4xl font-bold text-black mt-1">
                                Rp <span id="total_display">0</span>
                            </div>
                            <input type="hidden" name="FinalPrice" id="final_price">
                        </div>
                    </div>
                </div>

                <div class="mt-10 flex gap-4">
                    <button type="reset" class="px-6 py-3 border-2 border-gray-200 text-gray-600 font-bold rounded-lg hover:bg-gray-100 transition">
                        Clear Form
                    </button>
                    <button type="submit" class="flex-1 bg-gray-800 text-white font-bold py-3 rounded-lg hover:bg-black shadow-lg transition">
                        Process Order
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const productSelect = document.getElementById('product_id');
            const qtyInput = document.getElementById('order_quantity');
            const stockLabel = document.getElementById('stock-count');
            const stockError = document.getElementById('stock-error');
            const totalDisplay = document.getElementById('total_display');

            function validateAndCalculate() {
                const selectedOption = productSelect.options[productSelect.selectedIndex];
                const stockAvailable = parseInt(selectedOption.getAttribute('data-stock')) || 0;
                const price = parseFloat(selectedOption.getAttribute('data-price')) || 0;
                const qty = parseInt(qtyInput.value) || 0;

                // Display current stock info
                if(productSelect.value) {
                    stockLabel.innerText = `Stock: ${stockAvailable}`;
                }

                // Stock Validation UI
                if (qty > stockAvailable) {
                    qtyInput.classList.add('border-red-500');
                    stockError.classList.remove('hidden');
                } else {
                    qtyInput.classList.remove('border-red-500');
                    stockError.classList.add('hidden');
                }

                // Calculate Total
                const total = price * qty;
                totalDisplay.innerText = new Intl.NumberFormat('id-ID').format(total);
                document.getElementById('final_price').value = total;
                document.getElementById('unit_price').value = price;
            }

            productSelect.addEventListener('change', validateAndCalculate);
            qtyInput.addEventListener('input', validateAndCalculate);
        });
    </script>
</x-admin-app-layout>