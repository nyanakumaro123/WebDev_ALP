<x-admin-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
        <div class="flex justify-center">
            <div class="w-full md:w-8/12">
                <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                    <div class="px-6 py-4 bg-gray-100 border-b border-gray-200">
                        <h5 class="text-lg font-semibold text-gray-800">{{ ('Edit Color') }}</h5>
                    </div>

                    <div class="p-6">
                        <form action="{{ route('color.update', $color->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-6">
                                <label for="ColorName" class="block text-sm font-medium text-gray-700 mb-2">{{ ('Color Name') }}</label>
                                <div>
                                    <input id="ColorName" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('ColorName') border-red-500 @enderror" name="ColorName" value="{{ old('ColorName', $color->ColorName) }}" required autocomplete="ColorName" autofocus>

                                    @error('ColorName')
                                        <p class="mt-1 text-sm text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-6">
                                <label for="ColorCategoryID" class="block text-sm font-medium text-gray-700 mb-2">{{ ('Color Category') }}</label>
                                <div>
                                    <select id="ColorCategoryID" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('ColorCategoryID') border-red-500 @enderror" name="ColorCategoryID" required>
                                        <option value="">Select Category</option>
                                        @foreach($colorCategories as $category)
                                            <option value="{{ $category->id }}" {{ old('ColorCategoryID', $color->ColorCategoryID) == $category->id ? 'selected' : '' }}>
                                                {{ $category->ColorCategoryName }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('ColorCategoryID')
                                        <p class="mt-1 text-sm text-red-600">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex items-center space-x-4">
                                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    {{ ('Update') }}
                                </button>
                                <a href="{{ route('color.list.view') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition-colors">
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