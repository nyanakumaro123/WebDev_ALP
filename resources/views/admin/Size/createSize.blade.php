<x-admin-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex justify-center">
            <div class="w-full md:w-8/12">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <!-- Card Header -->
                    <div class="px-6 py-4 bg-gray-100 border-b border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-800">{{ ('Create Size') }}</h4>
                    </div>

                    <!-- Card Body -->
                    <div class="p-6">
                        <form method="POST" action="{{ route('sizes.create') }}">
                            @csrf

                            <!-- Size Value -->
                            <div class="mb-6">
                                <label for="SizeValue" class="block text-sm font-medium text-gray-700 mb-2">
                                    {{ ('Size Value') }}
                                </label>
                                <div>
                                    <input id="SizeValue" 
                                           type="text" 
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('SizeValue') border-red-500 @enderror" 
                                           name="SizeValue" 
                                           value="{{ old('SizeValue') }}" 
                                           required 
                                           autocomplete="SizeValue" 
                                           autofocus>

                                    @error('SizeValue')
                                        <p class="mt-2 text-sm text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Size Category -->
                            <div class="mb-6">
                                <div class="flex justify-between items-center mb-2">
                                    <label for="SizeCategoryID" class="block text-sm font-medium text-gray-700">
                                        {{ ('Size Category') }}
                                    </label>
                                    <a href="{{ route('size.category.create.view') }}" 
                                       class="text-sm text-blue-600 hover:text-blue-800">
                                        New Category
                                    </a>
                                </div>
                                <div>
                                    <select id="SizeCategoryID" 
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('SizeCategoryID') border-red-500 @enderror" 
                                            name="SizeCategoryID" 
                                            required>
                                        <option value="">Select Category</option>
                                        @foreach($sizeCategories as $category)
                                            <option value="{{ $category->id }}" {{ old('SizeCategoryID') == $category->id ? 'selected' : '' }}>
                                                {{ $category->SizeCategoryName }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('SizeCategoryID')
                                        <p class="mt-2 text-sm text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="flex justify-end space-x-3">
                                <button type="submit" 
                                        class="px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    {{ ('Create') }}
                                </button>
                                <a href="{{ route('sizes.list.view') }}" 
                                   class="px-4 py-2 bg-gray-300 text-gray-700 font-medium rounded-md hover:bg-gray-400 transition-colors">
                                    {{ ('Cancel') }}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>