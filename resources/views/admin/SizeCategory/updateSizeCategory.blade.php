<x-admin-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex justify-center">
            <div class="w-full md:w-8/12">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <!-- Card Header -->
                    <div class="px-6 py-4 bg-gray-100 border-b border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-800">{{ __('Edit Size Category') }}</h4>
                    </div>

                    <!-- Card Body -->
                    <div class="p-6">
                        <form method="POST" action="{{ route('size.category.update', $sizeCategory->id) }}">
                            @csrf
                            @method('PUT')

                            <!-- Category Name -->
                            <div class="mb-6">
                                <label for="SizeCategoryName" class="block text-sm font-medium text-gray-700 mb-2">
                                    {{ __('Category Name') }}
                                </label>
                                <div>
                                    <input id="SizeCategoryName" 
                                           type="text" 
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500 @error('SizeCategoryName') border-red-500 @enderror" 
                                           name="SizeCategoryName" 
                                           value="{{ old('SizeCategoryName', $sizeCategory->SizeCategoryName) }}" 
                                           required 
                                           autocomplete="SizeCategoryName" 
                                           autofocus>

                                    @error('SizeCategoryName')
                                        <p class="mt-2 text-sm text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="flex justify-end space-x-3">
                                <button type="submit" 
                                        class="px-4 py-2 bg-gray-800 text-white font-medium rounded-md hover:bg-black transition-colors focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                    {{ __('Update Category') }}
                                </button>
                                <a href="{{ route('size.category.list.view') }}" 
                                   class="px-4 py-2 bg-gray-300 text-gray-700 font-medium rounded-md hover:bg-gray-400 transition-colors">
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