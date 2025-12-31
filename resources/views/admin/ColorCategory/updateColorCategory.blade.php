<x-admin-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex justify-center">
            <div class="w-full md:w-8/12">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <!-- Card Header -->
                    <div class="px-6 py-4 bg-gray-100 border-b border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-800">{{ ('Edit Color Category') }}</h4>
                    </div>

                    <!-- Card Body -->
                    <div class="p-6">
                        <form action="{{ route('color.category.update', $colorCategory->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Color Category Name -->
                            <div class="mb-6">
                                <label for="ColorCategoryName" class="block text-sm font-medium text-gray-700 mb-2">
                                    {{ ('Color Category Name') }}
                                </label>
                                <div>
                                    <input id="ColorCategoryName" 
                                           type="text" 
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('ColorCategoryName') border-red-500 @enderror" 
                                           name="ColorCategoryName" 
                                           value="{{ old('ColorCategoryName', $colorCategory->ColorCategoryName) }}" 
                                           required 
                                           autocomplete="ColorCategoryName" 
                                           autofocus>

                                    @error('ColorCategoryName')
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
                                    {{ ('Update') }}
                                </button>
                                <a href="{{ route('color.list.view') }}" 
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