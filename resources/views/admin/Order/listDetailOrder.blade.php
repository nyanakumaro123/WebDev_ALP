<x-admin-app-layout>
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="flex justify-between items-center ">
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Detail Order</h1>
            </div>

            <div
                class="bg-indigo-700 rounded-2xl p-8 mb-10 text-white shadow-xl flex flex-col md:flex-row justify-between items-center gap-x-2">
                <div class="flex items-center gap-6">
                    <div>
                        <p class="text-indigo-200 text-sm font-bold uppercase tracking-widest">Total Transaction</p>
                        <h2 class="text-5xl font-black mt-1">Rp {{ number_format($grandTotal, 0, ',', '.') }}</h2>
                    </div>
                </div>

                @if (count($detailOrders) > 0)
                    <a href="{{ route('show.invoice', ['ids' => $orderIds]) }}" target="_blank"
                        class="ml-8 bg-white text-indigo-700 px-8 py-4 rounded-2xl font-black text-lg shadow-lg hover:scale-105 transition-all whitespace-nowrap">
                        GENERATE INVOICE
                    </a>
                @endif
            </div>

        </div>
        <div class="mb-6"> <a href="{{ route('detail.order.create.view') }}"
                class="inline-flex items-center px-4 py-1.5 bg-blue-600 border border-transparent rounded-md font-bold text-[10px] text-white uppercase tracking-widest hover:bg-blue-700 transition shadow-sm">
                <i class="fa-solid fa-plus mr-2"></i> Add New Detail Order
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($detailOrders as $order)
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden flex flex-col">
                    <div class="p-4 bg-gray-50 flex justify-between items-center border-b border-gray-100">
                        <span class="text-xs font-bold text-indigo-600">ID #{{ $order->id }}</span>
                        <span class="text-xs text-gray-400">{{ $order->created_at->format('M d, H:i') }}</span>
                    </div>

                    <div class="p-6 flex-grow">
                        @foreach ($order->Products as $product)
                            <h3 class="text-xl font-bold text-gray-900">{{ $product->ProductName }}</h3>
                        @endforeach

                        <div class="mt-4 space-y-2">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-400">Color / Size</span>
                                <span class="text-gray-700 font-medium">
                                    @foreach ($order->Colors as $c)
                                        {{ $c->ColorName }}
                                    @endforeach /
                                    @foreach ($order->Sizes as $s)
                                        {{ $s->SizeValue }} {{ $s->SizeCategory->SizeCategoryName }}
                                    @endforeach
                                </span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-400">Qty Ordered</span>
                                <span class="text-gray-900 font-bold">{{ $order->OrderQuantity }} pcs</span>
                            </div>

                            <div
                                class="my-4 border-t border-dashed border-gray-200 pt-4 flex justify-between items-center">
                                <span class="text-gray-600 font-semibold">Total Paid</span>
                                <span class="text-2xl font-black text-indigo-700">Rp
                                    {{ number_format($order->FinalPrice, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 bg-gray-50 border-t border-gray-100">
                        <form action="{{ route('detail.order.delete', $order->id) }}" method="POST"
                            onsubmit="return confirm('Restore {{ $order->OrderQuantity }} items to stock and delete this record?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full bg-white text-red-500 border border-red-200 py-2 rounded-lg font-bold hover:bg-red-500 hover:text-white transition">
                                <i class="fa-solid fa-trash-can mr-2"></i> Cancel & Restore Stock
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-admin-app-layout>
