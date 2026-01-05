<div class="flex h-screen">
    <!-- Sidebar -->
    <nav class="w-64 bg-gray-900 text-white shadow-lg flex flex-col">
        <!-- Brand -->
        <div class="p-4 border-b border-gray-800">
            <a href="/" class="text-xl font-bold text-white hover:text-gray-300 transition-colors">
                Toko Cahaya Makmur
            </a>
        </div>

        <!-- Mobile Menu Button (only visible on mobile) -->
        <div class="md:hidden p-4 border-b border-gray-800">
            <button id="mobile-menu-button" class="text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <!-- Navigation Links -->
        <div class="flex-grow overflow-y-auto py-4">
            <!-- Desktop Navigation -->
            <div class="hidden md:flex flex-col space-y-2 px-4">
                <a href="{{ route('shop') }}" class="py-2 px-4 hover:bg-gray-800 rounded transition-colors hover:text-gray-300">
                    Products
                </a>
                <a href="{{ route('brands.list.view') }}" class="py-2 px-4 hover:bg-gray-800 rounded transition-colors hover:text-gray-300">
                    Brands
                </a>
                <a href="{{ route('reviews.list.view') }}" class="py-2 px-4 hover:bg-gray-800 rounded transition-colors hover:text-gray-300">
                    Review
                </a>
            </div>

            <!-- Mobile Menu (Hidden by default) -->
            <div id="mobile-menu" class="md:hidden hidden flex flex-col space-y-2 px-4">
                <a href="{{ url('/index') }}" class="py-2 px-4 hover:bg-gray-800 rounded transition-colors hover:text-gray-300">
                    Products
                </a>
                
                <!-- Auth Links in Mobile -->
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left py-2 px-4 hover:bg-gray-800 rounded transition-colors text-white hover:text-gray-300">
                            Logout
                        </button>
                    </form>
                @endauth
            </div>
        </div>

        <!-- Auth Section -->
        <div class="hidden md:block p-4 border-t border-gray-800">
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