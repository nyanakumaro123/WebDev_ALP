<x-admin-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex justify-center">
            <div class="w-full md:w-10/12">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <!-- Card Header -->
                    <div class="px-6 py-4 bg-gray-100 border-b border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-800">{{ __('Create New Product') }}</h4>
                    </div>

                    <!-- Card Body -->
                    <div class="p-6">
                        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Row 1: Name & Price -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label for="ProductName" class="block text-sm font-medium text-gray-700 mb-2">
                                        {{ __('Product Name') }}
                                    </label>
                                    <input id="ProductName" 
                                           type="text" 
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('ProductName') border-red-500 @enderror" 
                                           name="ProductName" 
                                           value="{{ old('ProductName') }}" 
                                           required 
                                           autofocus>
                                    @error('ProductName')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="Price" class="block text-sm font-medium text-gray-700 mb-2">
                                        {{ __('Price') }}
                                    </label>
                                    <input id="Price" 
                                           type="number" 
                                           step="0.01" 
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('Price') border-red-500 @enderror" 
                                           name="Price" 
                                           value="{{ old('Price') }}" 
                                           required>
                                    @error('Price')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Row 2: Quantity & Category -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label for="ProductQuantity" class="block text-sm font-medium text-gray-700 mb-2">
                                        {{ __('Quantity') }}
                                    </label>
                                    <input id="ProductQuantity" 
                                           type="number" 
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('ProductQuantity') border-red-500 @enderror" 
                                           name="ProductQuantity" 
                                           value="{{ old('ProductQuantity') }}" 
                                           required>
                                    @error('ProductQuantity')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <label for="ProductCategoryID" class="block text-sm font-medium text-gray-700">
                                            {{ __('Category') }}
                                        </label>
                                        <a href="{{ route('product.category.create.view') }}" 
                                           class="text-sm text-blue-600 hover:text-blue-800">
                                            New Category
                                        </a>
                                    </div>
                                    <select id="ProductCategoryID" 
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('ProductCategoryID') border-red-500 @enderror" 
                                            name="ProductCategoryID" 
                                            required>
                                        <option value="">Select Category</option>
                                        @foreach($productCategories as $category)
                                            <option value="{{ $category->id }}" {{ old('ProductCategoryID') == $category->id ? 'selected' : '' }}>
                                                {{ $category->ProductCategoryName }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('ProductCategoryID')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Row 3: Brand & Color -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <label for="BrandID" class="block text-sm font-medium text-gray-700">
                                            {{ __('Brand') }}
                                        </label>
                                        <a href="{{ route('brands.create.view') }}" 
                                           class="text-sm text-blue-600 hover:text-blue-800">
                                            New Brand
                                        </a>
                                    </div>
                                    <select id="BrandID" 
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('BrandID') border-red-500 @enderror" 
                                            name="BrandID" 
                                            required>
                                        <option value="">Select Brand</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" {{ old('BrandID') == $brand->id ? 'selected' : '' }}>
                                                {{ $brand->BrandName }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('BrandID')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <label for="ColorID" class="block text-sm font-medium text-gray-700">
                                            {{ __('Color') }}
                                        </label>
                                        <a href="{{ route('color.create.view') }}" 
                                           class="text-sm text-blue-600 hover:text-blue-800">
                                            New Color
                                        </a>
                                    </div>
                                    <select id="ColorID" 
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('ColorID') border-red-500 @enderror" 
                                            name="ColorID" 
                                            required>
                                        <option value="">Select Color</option>
                                        @foreach($colors as $color)
                                            <option value="{{ $color->id }}" {{ old('ColorID') == $color->id ? 'selected' : '' }}>
                                                {{ $color->ColorName }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('ColorID')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Row 4: Supplier & Size -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <label for="SupplierID" class="block text-sm font-medium text-gray-700">
                                            {{ __('Supplier') }}
                                        </label>
                                        <a href="{{ route('suppliers.create.view') }}" 
                                           class="text-sm text-blue-600 hover:text-blue-800">
                                            New Supplier
                                        </a>
                                    </div>
                                    <select id="SupplierID" 
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('SupplierID') border-red-500 @enderror" 
                                            name="SupplierID" 
                                            required>
                                        <option value="">Select Supplier</option>
                                        @foreach($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}" {{ old('SupplierID') == $supplier->id ? 'selected' : '' }}>
                                                {{ $supplier->SupplierName }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('SupplierID')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <label for="SizeID" class="block text-sm font-medium text-gray-700">
                                            {{ __('Size') }}
                                        </label>
                                        <a href="{{ route('sizes.create.view') }}" 
                                           class="text-sm text-blue-600 hover:text-blue-800">
                                            New Size
                                        </a>
                                    </div>
                                    <select id="SizeID" 
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('SizeID') border-red-500 @enderror" 
                                            name="SizeID" 
                                            required>
                                        <option value="">Select Size</option>
                                        @foreach($sizes as $size)
                                            <option value="{{ $size->id }}" {{ old('SizeID') == $size->id ? 'selected' : '' }}>
                                                {{ $size->SizeValue }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('SizeID')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Image Upload -->
                            <div class="mb-6">
                                <label for="Image" class="block text-sm font-medium text-gray-700 mb-2">
                                    {{ __('Product Image') }}
                                </label>
                                <input id="Image" 
                                       type="file" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('Image') border-red-500 @enderror" 
                                       name="Image" 
                                       required>
                                @error('Image')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Form Actions -->
                            <div class="flex justify-end space-x-3">
                                <button type="submit" 
                                        class="px-6 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    {{ __('Save Product') }}
                                </button>
                                <a href="{{ route('products.list.view') }}" 
                                   class="px-6 py-2 bg-gray-300 text-gray-700 font-medium rounded-md hover:bg-gray-400 transition-colors">
                                    {{ __('Cancel') }}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>