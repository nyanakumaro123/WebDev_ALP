<div class="min-h-screen flex items-center justify-center bg-gray-100 p-4 sm:p-6">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-xl">
        
        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">
            Create New Brand
        </h2>

       <form action="{{ route('brands.store') }}" method="POST" class="space-y-6">
        @csrf
            
            <div>
                <label for="brand_name" class="block text-sm font-medium text-gray-700">
                    Brand Name
                </label>
                <div class="mt-1">
                    <input 
                        type="text" 
                        name="brand_name" 
                        id="brand_name" 
                        required 
                        placeholder="e.g., Acme Co."
                        class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    >
                </div>
                </div>

            <div>
                <button 
                    type="submit" 
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out"
                >
                    Save Brand
                </button>
            </div>
        </form>

    </div>
</div>