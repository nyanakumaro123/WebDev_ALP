<x-admin-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex justify-center">
            <div class="w-full">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <!-- Card Header -->
                    <div class="px-6 py-4 bg-gray-100 border-b border-gray-200 flex justify-between items-center">
                        <h4 class="text-lg font-semibold text-gray-800">{{ __('Product List') }}</h4>
                        <a href="{{ route('products.create.view') }}" 
                           class="px-4 py-2 bg-gray-800 text-white font-medium rounded-md hover:bg-black transition-colors">
                            {{ __('Add New Product') }}
                        </a>
                    </div>

                    <!-- Card Body -->
                    <div class="p-6">
                        @if (session('success'))
                            <div class="mb-4 p-4 bg-green-100 border border-green-200 text-green-700 rounded-md">
                                {{ session('success') }}
                            </div>
                        @endif
                        
                        @if (session('error'))
                            <div class="mb-4 p-4 bg-red-100 border border-red-200 text-red-700 rounded-md">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if ($products->isEmpty())
                            <div class="p-4 bg-blue-100 border border-blue-200 text-black rounded-md">
                                No products found.
                            </div>
                        @else
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Brand</th>
                                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Colors</th>
                                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sizes</th>
                                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Qty</th>
                                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($products as $product)
                                            <tr class="hover:bg-gray-50 transition-colors">
                                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->id }}</td>
                                                <td class="px-4 py-4 whitespace-nowrap">
                                                    @if($product->Image)
                                                        <img src="{{ asset('storage/' . $product->Image) }}" 
                                                             alt="{{ $product->ProductName }}" 
                                                             class="w-12 h-12 object-cover rounded border border-gray-300">
                                                    @else
                                                        <span class="text-gray-400">N/A</span>
                                                    @endif
                                                </td>
                                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->ProductName }}</td>
                                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $product->ProductCategory->ProductCategoryName ?? 'N/A' }}
                                                </td>
                                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $product->Brand->BrandName ?? 'N/A' }}
                                                </td>
                                                <td class="px-4 py-4 whitespace-nowrap text-sm">
                                                    @if($product->Colors->isNotEmpty())
                                                        <div class="flex items-center space-x-2">
                                                            <div class="flex space-x-1">
                                                                @foreach($product->Colors as $color)
                                                                    <div class="w-5 h-5 rounded border border-gray-300" 
                                                                         style="background-color: {{ $color->ColorCode ?? '#ccc' }};"
                                                                         title="{{ $color->ColorName }}"></div>
                                                                @endforeach
                                                            </div>
                                                            <span class="text-gray-600 text-xs">
                                                                {{ $product->Colors->pluck('ColorName')->implode(', ') }}
                                                            </span>
                                                        </div>
                                                    @else
                                                        <span class="text-gray-400">No colors</span>
                                                    @endif
                                                </td>
                                                <td class="px-4 py-4 whitespace-nowrap text-sm">
                                                    @if($product->Sizes->isNotEmpty())
                                                        <span class="text-gray-900">
                                                            {{ $product->Sizes->pluck('SizeValue')->implode(', ') }} {{ $product->SizeCategoryName }}
                                                        </span>
                                                    @else
                                                        <span class="text-gray-400">No sizes</span>
                                                    @endif
                                                </td>
                                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    Rp{{ number_format($product->Price, 0, ',', '.') }}
                                                </td>
                                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $product->ProductQuantity }}
                                                </td>
                                                <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
                                                    <div class="flex space-x-2">
                                                        <a href="{{ route('products.update.view', $product->id) }}"
                                                           class="px-3 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition-colors">
                                                            Edit
                                                        </a>
                                                        <form action="{{ route('products.delete', $product->id) }}" 
                                                              method="POST" 
                                                              class="inline"
                                                              onsubmit="return confirm('Are you sure you want to delete this product?')">
                                                            @csrf 
                                                            @method('DELETE') 
                                                            <button type="submit"
                                                                    class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors">
                                                                Delete
                                                            </button> 
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>