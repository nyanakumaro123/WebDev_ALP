<x-app-layout>
    <div class="bg-gray-50 min-h-screen">
        <div class="bg-white border-b border-gray-100">
            <div class="max-w-7xl mx-auto px-6 py-12 flex flex-col md:flex-row items-center justify-between">
                <div>
                    <h1 class="text-4xl font-black text-gray-900 tracking-tight">Our Collection</h1>
                    <p class="text-gray-500 mt-2 text-lg">Quality goods curated for your lifestyle.</p>
                </div>
                <div class="mt-6 md:mt-0 relative w-full md:w-96">
                    <input type="text" placeholder="Search products..." 
                           class="w-full pl-12 pr-4 py-3 rounded-2xl border-none bg-gray-100 focus:ring-2 focus:ring-indigo-500 transition-all">
                    <svg class="w-5 h-5 absolute left-4 top-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-6 py-10 flex flex-col lg:flex-row gap-10">
            <aside class="w-full lg:w-64 space-y-8">
                <div>
                    <h3 class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-4">Categories</h3>
                    <div class="flex flex-wrap lg:flex-col gap-2">
                        <a href="#" class="px-4 py-2 bg-indigo-600 text-white rounded-xl text-sm font-bold shadow-md shadow-indigo-100">All Items</a>
                        @foreach($productCategories as $category)
                            <a href="#" class="px-4 py-2 bg-white text-gray-600 hover:bg-indigo-50 hover:text-indigo-600 rounded-xl text-sm font-semibold transition-colors border border-gray-100">
                                {{ $category->ProductCategoryName }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </aside>

            <div class="flex-1">
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-8">
                    @foreach($products as $product)
                        <div class="group relative bg-white rounded-[2rem] overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-gray-100 flex flex-col">
                            
                            <div class="aspect-[4/5] overflow-hidden bg-gray-200 relative">
                                <img src="{{ asset('storage/' . $product->Image) }}" 
                                     alt="{{ $product->ProductName }}" 
                                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                
                                <span class="absolute top-4 left-4 px-3 py-1 bg-white/90 backdrop-blur text-[10px] font-black uppercase tracking-widest rounded-full shadow-sm">
                                    {{ $product->Brand->BrandName }}
                                </span>
                            </div>

                            <div class="p-6 flex flex-col flex-grow">
                                <h3 class="text-xl font-bold text-gray-900 group-hover:text-indigo-600 transition-colors mb-1">
                                    {{ $product->ProductName }}
                                </h3>
                                <p class="text-xs font-bold text-indigo-500 group-hover:text-black uppercase tracking-widest mb-4">
                                    {{ $product->ProductCategory->ProductCategoryName }}
                                </p>

                                <div class="space-y-3 mb-6">
                                    <div class="flex items-center gap-2">
                                        <span class="text-[10px] font-bold text-gray-400 uppercase w-12">Sizes:</span>
                                        <div class="flex flex-wrap gap-1">
                                            @foreach($product->Sizes as $size)
                                                <span class="px-2 py-0.5 bg-gray-100 text-black rounded text-[10px] font-bold border border-gray-200">
                                                    {{ $size->SizeValue }} {{ $size->SizeCategory->SizeCategoryName }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <span class="text-[10px] font-bold text-gray-400 uppercase w-12">Colors:</span>
                                        <div class="flex flex-wrap gap-2">
                                            @foreach($product->colors as $color)
                                                <div> {{ $color->ColorName }}</div>
                                                <div class="w-4 h-4 rounded-full border border-gray-200 shadow-sm" 
                                                     style="background-color: {{ $color->ColorHex ?? '#ddd' }}" 
                                                     title="{{ $color->ColorName }}"></div>
                                            @endforeach
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-center gap-2">
                                        <span class="text-[10px] font-bold text-gray-400 uppercase w-12">Color Code:</span>
                                        <div class="flex flex-wrap gap-2">
                                            @foreach($product->colors as $color)
                                                <div> {{ $color->ColorCode }}</div>
                                                
                                            @endforeach
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-center gap-2">
                                        <span class="text-[10px] font-bold text-gray-400 uppercase w-12">Stock:</span>
                                        @if($product->ProductQuantity > 0)
                                            <span class="text-[10px] font-bold text-green-600">{{ $product->ProductQuantity }}</span>
                                        @else
                                            <span class="text-[10px] font-bold text-red-500">Out of Stock</span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="flex items-center justify-between mt-auto pt-4 border-t border-gray-50">
                                    <span class="text-2xl font-black text-gray-900">
                                        Rp {{ number_format($product->Price, 0, ',', '.') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-16 flex justify-center">
                    <div class="bg-white px-6 py-4 rounded-3xl shadow-sm border border-gray-100">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>