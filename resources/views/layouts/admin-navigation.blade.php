<nav class="sticky top-0 z-50 bg-gray-900 text-white shadow-lg">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16">
            <!-- Brand -->
            <a href="{{ url('/') }}" class="text-xl font-bold text-white hover:text-gray-300 transition-colors">
                Toko Cahaya Makmur
            </a>

            <!-- Centered Navigation Links (Desktop) -->
            <div class="hidden md:flex space-x-6">
                <a href="{{ route('products.list.view') }}" class="hover:text-gray-300 transition-colors">Products</a>
                <a href="{{ route('product.category.list.view') }}" class="hover:text-gray-300 transition-colors">Categories</a>
                <a href="{{ route('brands.list.view') }}" class="hover:text-gray-300 transition-colors">Brands</a>
                <a href="{{ route('color.list.view') }}" class="hover:text-gray-300 transition-colors">Colors</a>
                <a href="{{ route('sizes.list.view') }}" class="hover:text-gray-300 transition-colors">Sizes</a>
                <a href="{{ route('suppliers.list.view') }}" class="hover:text-gray-300 transition-colors">Suppliers</a>
                <a href="{{ route('stockhistory.list.view') }}" class="hover:text-gray-300 transition-colors">Stock History</a> 
            </div>

            <!-- Auth Section -->
            <div class="flex items-center">
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-white hover:text-gray-300 transition-colors">
                            Logout
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</nav>