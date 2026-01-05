<div class="flex h-screen">
    <!-- Sidebar -->
    <nav class="w-64 bg-gray-900 text-white shadow-lg flex flex-col">
        <!-- Brand -->
        <div class="p-4 border-b border-gray-800">
            <a href="{{ url('/') }}" class="text-xl font-bold text-white hover:text-gray-300 transition-colors">
                Toko Cahaya Makmur
            </a>
        </div>

        <!-- Navigation Links -->
        <div class="flex-grow overflow-y-auto py-4">
            <div class="flex flex-col space-y-2 px-4">
                <a href="{{ route('products.list.view') }}" class="py-2 px-4 hover:bg-gray-800 rounded transition-colors hover:text-gray-300">
                    Products
                </a>
                <a href="{{ route('product.category.list.view') }}" class="py-2 px-4 hover:bg-gray-800 rounded transition-colors hover:text-gray-300">
                    Categories
                </a>
                <a href="{{ route('brands.list.view') }}" class="py-2 px-4 hover:bg-gray-800 rounded transition-colors hover:text-gray-300">
                    Brands
                </a>
                <a href="{{ route('color.list.view') }}" class="py-2 px-4 hover:bg-gray-800 rounded transition-colors hover:text-gray-300">
                    Colors
                </a>
                <a href="{{ route('sizes.list.view') }}" class="py-2 px-4 hover:bg-gray-800 rounded transition-colors hover:text-gray-300">
                    Sizes
                </a>
                <a href="{{ route('suppliers.list.view') }}" class="py-2 px-4 hover:bg-gray-800 rounded transition-colors hover:text-gray-300">
                    Suppliers
                </a>
                <a href="{{ route('stockhistory.list.view') }}" class="py-2 px-4 hover:bg-gray-800 rounded transition-colors hover:text-gray-300">
                    Stock History
                </a>
                <a href="{{ route('detail.order.list.view') }}" class="py-2 px-4 hover:bg-gray-800 rounded transition-colors hover:text-gray-300">
                    Detail Orders
                </a>
            </div>
        </div>

        <!-- Auth Section -->
        <div class="p-4 border-t border-gray-800">
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left py-2 px-4 hover:bg-gray-800 rounded transition-colors text-white hover:text-gray-300">
                        Logout
                    </button>
                </form>
            @endauth
        </div>
    </nav>

    <!-- Main Content Area -->
    <main class="flex-grow overflow-auto bg-gray-100">
        <!-- Content from parent layout will be inserted here -->
        {{ $slot }}
    </main>
</div>