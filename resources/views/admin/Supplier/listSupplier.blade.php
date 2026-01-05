<x-admin-app-layout>

<div class="container mx-auto px-6 py-10">
    {{-- Header Section: Title and Add Button --}}
    <div class="flex justify-between items-center mb-8 border-b pb-4">
        <h1 class="text-4xl font-extrabold text-gray-800 tracking-tight">Supplier Directory</h1>
        {{-- Link to the brand creation view --}}
        <a href="{{ route('suppliers.create.view') }}" 
           class="inline-flex items-center px-6 py-3 border border-transparent text-base font-semibold rounded-lg shadow-lg text-white bg-gray-800 hover:bg-black transition duration-200 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-gray-500 focus:ring-opacity-50">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Add New Supplier
        </a>
    </div>

    {{-- The Grid of Cards: Highly Polished Layout --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

        {{-- Loop through the $brands collection passed from the controller --}}
        @forelse ($suppliers as $supplier)
            <div class="bg-white rounded-xl shadow-2xl overflow-hidden transition duration-300 ease-in-out hover:shadow-indigo-300/50 hover:shadow-3xl border border-gray-100">
                
                <div class="p-6">
                    {{-- Brand Icon/Placeholder (Optional - add if you have an image) --}}
                    <div class="mb-4 flex items-center justify-center w-12 h-12 bg-indigo-100 rounded-full text-indigo-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-4a2 2 0 012-2h2a2 2 0 012 2v4"></path></svg>
                    </div>

                    {{-- Brand Name --}}
                    <h2 class="text-2xl font-bold text-gray-900 mb-4 truncate" title="{{ $supplier->SupplierName }}">
                        {{ $supplier->SupplierName}}
                    </h2>
                     <h2 class="text-2xl font-bold text-gray-900 mb-4 truncate" title="{{ $supplier->CompanyName }}">
                        {{ $supplier->CompanyName}}
                    </h2>
                    
                    {{-- Placeholder for details (optional: add description or product count here) --}}
                    {{-- <p class="text-sm text-gray-500 mb-4">Products: 42</p> --}}
                </div>
                
                {{-- Action Buttons in Footer --}}
                <div class="p-4 bg-gray-50 border-t flex space-x-3">
                    {{-- Edit Button --}}
                    <a href="{{ route('suppliers.update.view', $supplier->id) }}" 
                       class="flex-1 inline-flex justify-center items-center py-2 px-3 text-center rounded-lg text-sm font-medium text-yellow-600 bg-yellow-50 hover:bg-yellow-100 transition duration-150">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                        Edit
                    </a>
                    
                    {{-- Delete Button (using a form) --}}
                    <form action="{{ route('suppliers.delete', $supplier->id) }}" method="POST" class="flex-1"
                          onsubmit="return confirm('Are you sure you want to permanently remove the brand: {{ $supplier->supplier_name }}? This action cannot be undone.');">
                        @csrf
                        <button type="submit" 
                                class="w-full inline-flex justify-center items-center py-2 px-3 text-center rounded-lg text-sm font-medium text-white bg-red-600 hover:bg-red-700 transition duration-150 focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @empty
            {{-- Message if no brands are found (Enhanced) --}}
            <div class="col-span-full text-center py-20 bg-white rounded-xl shadow-lg border border-gray-200">
                <p class="text-2xl font-semibold text-gray-600 mb-2">👋 Nothing here yet!</p>
                <p class="text-lg text-gray-500">No brands have been added. Click the "Add New Brand" button to get started.</p>
            </div>
        @endforelse

    </div>
</div>
</x-admin-app-layout>