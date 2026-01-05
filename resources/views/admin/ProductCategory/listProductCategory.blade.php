<x-admin-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex justify-center">
            <div class="w-full md:w-10/12">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <!-- Card Header -->
                    <div class="px-6 py-4 bg-gray-100 border-b border-gray-200 flex justify-between items-center">
                        <h4 class="text-lg font-semibold text-gray-800">{{ 'Product Categories' }}</h4>
                        <form action="{{ route('product.category.list.view') }}" method="GET" class="flex w-full md:w-auto">
                            <input type="text" name="search" value="{{ request('search') }}" 
                                   placeholder="Search product categories name..." 
                                   class="rounded-l-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm w-full md:w-64">
                            <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-r-md hover:bg-black transition-colors text-sm">
                                Search
                            </button>
                        </form>
                        <a href="{{ route('product.category.create.view') }}" 
                           class="px-4 py-2 bg-gray-800 text-white font-medium rounded-md hover:bg-black transition-colors">
                            {{ 'Create New Category' }}
                        </a>
                    </div>

                    <!-- Card Body -->
                    <div class="p-6">
                        @if (session('success'))
                            <div class="mb-4 p-4 bg-green-100 border border-green-200 text-green-700 rounded-md">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($productCategories->isEmpty())
                            <div class="p-4 bg-blue-100 border border-blue-200 text-black rounded-md">
                                No product categories found.
                            </div>
                        @else
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category Name</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($productCategories as $category)
                                            <tr class="hover:bg-gray-50 transition-colors">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $category->id }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $category->ProductCategoryName }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                    <div class="flex space-x-2">
                                                        <a href="{{ route('product.category.update.view', $category->id) }}"
                                                           class="px-3 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition-colors">
                                                            Edit
                                                        </a>
                                                        <form action="{{ route('delete.product.category', $category->id) }}" 
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
                            <div class="mt-6">
                                {{ $productCategories->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>