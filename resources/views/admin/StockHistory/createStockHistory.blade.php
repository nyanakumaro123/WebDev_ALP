<x-admin-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex justify-center">
            <div class="w-full md:w-8/12">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="px-6 py-4 bg-gray-100 border-b border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-800">{{ __('Tambah Riwayat Stok') }}</h4>
                    </div>

                    <div class="p-6">
                        <form method="POST" action="{{ route('stockhistory.create') }}">
                            @csrf

                            <div class="mb-6">
                                <label for="ProductID" class="block text-sm font-medium text-gray-700 mb-2">
                                    {{ __('Produk') }}
                                </label>
                                <select id="ProductID" 
                                        name="ProductID" 
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500 @error('ProductID') border-red-500 @enderror">
                                    <option value="">-- Pilih Produk --</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}" {{ old('ProductID') == $product->id ? 'selected' : '' }}>
                                            {{ $product->ProductName }} (Sisa: {{ $product->ProductQuantity }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('ProductID')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label for="SupplierID" class="block text-sm font-medium text-gray-700 mb-2">
                                    {{ __('Supplier') }}
                                </label>
                                <select id="SupplierID" 
                                        name="SupplierID" 
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500 @error('SupplierID') border-red-500 @enderror">
                                    <option value="">-- Pilih Supplier --</option>
                                    @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}" {{ old('SupplierID') == $supplier->id ? 'selected' : '' }}>
                                            {{ $supplier->SupplierName }} - {{ $supplier->CompanyName }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('SupplierID')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                                <div>
                                    <label for="StockQuantity" class="block text-sm font-medium text-gray-700 mb-2">
                                        {{ __('Jumlah Stok Masuk') }}
                                    </label>
                                    <input id="StockQuantity" 
                                           type="number" 
                                           name="StockQuantity" 
                                           value="{{ old('StockQuantity') }}"
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500 @error('StockQuantity') border-red-500 @enderror">
                                    @error('StockQuantity')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="StockDate" class="block text-sm font-medium text-gray-700 mb-2">
                                        {{ __('Tanggal Masuk') }}
                                    </label>
                                    <input id="StockDate" 
                                           type="date" 
                                           name="StockDate" 
                                           value="{{ old('StockDate', date('Y-m-d')) }}"
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500 @error('StockDate') border-red-500 @enderror">
                                    @error('StockDate')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex justify-between items-center">
                                <a href="{{ route('stockhistory.list.view') }}" 
                                   class="px-6 py-2 bg-gray-300 text-gray-700 font-medium rounded-md hover:bg-gray-400 transition-colors">
                                    {{ __('Batal') }}
                                </a>
                                <button type="submit" 
                                        class="px-6 py-2 bg-gray-800 text-white font-medium rounded-md hover:bg-gray-900 transition-colors focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                    {{ __('Simpan Stok') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>