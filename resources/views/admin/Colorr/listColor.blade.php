<x-admin-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
        <div class="flex justify-center">
            <div class="w-full md:w-10/12">
                <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                    <div class="px-6 py-4 bg-gray-100 border-b border-gray-200 flex justify-between items-center">
                        <h4 class="text-lg font-semibold text-gray-800">{{ 'Colors' }}</h4>
                        <div class="flex flex-1 justify-center max-w-md w-full">
                            <form action="{{ route('color.list.view') }}" method="GET" class="flex w-full">
                                <input type="text" name="search" value="{{ request('search') }}" 
                                       placeholder="Search colors name..." 
                                       class="rounded-l-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm w-full">
                                <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-r-md hover:bg-black transition-colors text-sm">
                                    Search
                                </button>
                            </form>
                        </div>
                        <a href="{{ route('color.create.view') }}" class="px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-black transition-colors">
                            {{ 'Create New Color' }}
                        </a>
                    </div>

                    <div class="p-6">
                        @if (session('success'))
                            <div class="mb-4 p-4 bg-green-100 border border-green-200 text-green-700 rounded-md">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($colors->isEmpty())
                            <div class="p-4 bg-blue-100 border border-blue-200 text-black rounded-md">
                                No colors found.
                            </div>
                        @else
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Color Name</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Color Code</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($colors as $color)
                                            <tr class="hover:bg-gray-50 transition-colors">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $color->id }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $color->ColorName }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                    <div class="flex items-center space-x-2">
                                                        <span class="inline-block w-5 h-5 rounded border border-gray-300" style="background-color: {{ $color->ColorCode }};"></span>
                                                        <span class="text-gray-900">{{ $color->ColorCode }}</span>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $color->ColorCategory->ColorCategoryName }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $color->created_at->format('Y-m-d') }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                    <div class="flex space-x-2">
                                                        <a href="{{ route('color.update.view', $color->id) }}" class="px-3 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition-colors">
                                                            Edit
                                                        </a>
                                                        <form action="{{ route('color.delete', $color->id) }}" method="POST" class="inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors" onclick="return confirm('Are you sure?')">
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
                                {{ $colors->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>