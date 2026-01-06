<x-admin-app-layout>

    {{-- Outer container with background and centering --}}
    <div class="min-h-screen flex items-center justify-center bg-gray-50 p-4 sm:p-6 lg:p-8">
        
        {{-- Form Card Container: Matching the Create Supplier design --}}
        <div class="w-full max-w-sm bg-white p-8 sm:p-10 rounded-xl shadow-2xl border border-gray-100 transform transition duration-300 hover:shadow-indigo-300/50">
            
            {{-- Header with Icon --}}
            <div class="flex flex-col items-center mb-8">
                <div class="p-3 bg-indigo-100 rounded-full text-indigo-600 shadow-md mb-4">
                    {{-- Edit Icon --}}
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-extrabold text-gray-900">
                    Edit Supplier
                </h2>
                <p class="mt-2 text-sm text-gray-500 text-center">
                    Update the information for <strong>{{ $supplier->SupplierName }}</strong>.
                </p>
            </div>

            {{-- Form Start --}}
            <form method="POST" action="{{ route('suppliers.update', $supplier->id) }}" class="space-y-6">
                @csrf
                @method('PUT')
                
                {{-- Supplier Name Input Field --}}
                <div>
                    <label for="SupplierName" class="block text-sm font-semibold text-gray-700 mb-1">
                        Supplier Name <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-1">
                        <input 
                            type="text" 
                            name="SupplierName" 
                            id="SupplierName" 
                            value="{{ old('SupplierName', $supplier->SupplierName) }}"
                            required 
                            class="block w-full px-4 py-3 border @error('SupplierName') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500 text-base transition duration-150"
                        >
                        @error('SupplierName')
                            <p class="mt-1 text-xs text-red-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Company Name Input Field --}}
                <div>
                    <label for="CompanyName" class="block text-sm font-semibold text-gray-700 mb-1">
                        Company Name <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-1">
                        <input 
                            type="text" 
                            name="CompanyName" 
                            id="CompanyName" 
                            value="{{ old('CompanyName', $supplier->CompanyName) }}"
                            required 
                            class="block w-full px-4 py-3 border @error('CompanyName') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500 text-base transition duration-150"
                        >
                        @error('CompanyName')
                            <p class="mt-1 text-xs text-red-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="space-y-3 pt-2">
                    <button
                        type="submit" 
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-lg text-base font-semibold text-white bg-gray-800 hover:bg-black focus:outline-none focus:ring-4 focus:ring-gray-500 focus:ring-opacity-50 transition duration-200 ease-in-out transform hover:scale-[1.01]"
                    >
                        <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                        Update Supplier
                    </button>

                    <a href="{{ route('suppliers.list.view') }}" 
                       class="w-full flex justify-center py-3 px-4 border border-gray-300 rounded-lg text-base font-semibold text-gray-600 bg-white hover:bg-gray-50 transition duration-200">
                        Cancel
                    </a>
                </div>
            </form>
            {{-- Form End --}}

        </div>
    </div>
</x-admin-app-layout>