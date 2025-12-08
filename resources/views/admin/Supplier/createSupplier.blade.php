@extends('layouts.app') 

@section('content')

{{-- Outer container with background and centering --}}
<div class="min-h-screen flex items-center justify-center bg-gray-50 p-4 sm:p-6 lg:p-8">
    
    {{-- Form Card Container: Wider, modern shadow, and rounded edges --}}
    <div class="w-full max-w-sm bg-white p-8 sm:p-10 rounded-xl shadow-2xl border border-gray-100 transform transition duration-300 hover:shadow-indigo-300/50">
        
        {{-- Header with Icon --}}
        <div class="flex flex-col items-center mb-8">
            <div class="p-3 bg-indigo-100 rounded-full text-indigo-600 shadow-md mb-4">
                {{-- Icon representing a brand/tag --}}
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h10a2 2 0 012 2v14a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z"></path></svg>
            </div>
            <h2 class="text-3xl font-extrabold text-gray-900">
                Register New Brand
            </h2>
            <p class="mt-2 text-sm text-gray-500">
                Only the brand name is required to proceed.
            </p>
        </div>

        {{-- Form Start --}}
       <form action="{{ route('supplier.store') }}" method="POST" class="space-y-8">
        @csrf
            
            {{-- Brand Name Input Field --}}
            <div>
                <label for="SupplierName" class="block text-sm font-semibold text-gray-700 mb-1">
                    Supplier Name <span class="text-red-500">*</span>
                </label>
                <div class="mt-1">
                    <input 
                        type="text" 
                        name="SupplierName" 
                        id="SupplierName" 
                        required 
                        placeholder="e.g., Tesla, Nike, or Acme Co."
                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-base transition duration-150"
                    >
                </div>
            </div>

             <div>
                <label for="SupplierName" class="block text-sm font-semibold text-gray-700 mb-1">
                    Company Name <span class="text-red-500">*</span>
                </label>
                <div class="mt-1">
                    <input 
                        type="text" 
                        name="CompanyName" 
                        id="CompanyName" 
                        required 
                        placeholder="e.g., Tesla, Nike, or Acme Co."
                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-base transition duration-150"
                    >
                </div>
            </div>


            {{-- Save Brand Button --}}
            <div>
                <button
                    type="submit" 
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-lg text-base font-semibold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-500 focus:ring-opacity-50 transition duration-200 ease-in-out transform hover:scale-[1.01]"
                >
                    <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Save Supploer
                </button>
            </div>
        </form>
        {{-- Form End --}}

    </div>
</div>
@endsection