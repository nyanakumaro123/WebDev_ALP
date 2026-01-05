<x-admin-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex justify-center">
            <div class="w-full md:w-10/12">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <!-- Card Header -->
                    <div class="px-6 py-4 bg-gray-100 border-b border-gray-200 flex justify-between items-center">
                        <h4 class="text-lg font-semibold text-gray-800">{{ 'Color Categories' }}</h4>
                        <a href="{{ route('color.category.create.view') }}" 
                           class="px-4 py-2 bg-gray-800 text-white font-medium rounded-md hover:bg-black transition-colors">
                            {{ 'Create New Color Category' }}
                        </a>
                    </div>

                    <!-- Card Body -->
                    <div class="p-6">
                        @if (session('success'))
                            <div class="mb-4 p-4 bg-green-100 border border-green-200 text-green-700 rounded-md">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($colorCategories->isEmpty())
                            <div class="p-4 bg-blue-100 border border-blue-200 text-black rounded-md">
                                No color categories found.
                            </div>
                        @else
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Color Category Name</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($colorCategories as $category)
                                            <tr class="hover:bg-gray-50 transition-colors">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $category->id }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $category->ColorCategoryName }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $category->created_at->format('Y-m-d') }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                    <div class="flex space-x-2">
                                                        <a href="{{ route('color.category.update.view', $category->id) }}"
                                                           class="px-3 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition-colors">
                                                            Edit
                                                        </a>
                                                        <form action="{{ route('color.category.delete', $category->id) }}" 
                                                              method="POST" 
                                                              class="inline"
                                                              onsubmit="return confirm('Are you sure?')">
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