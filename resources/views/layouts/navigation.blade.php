<nav class="sticky top-0 z-50 bg-gray-900 text-white shadow-lg">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16">
            <!-- Brand -->
            <a href="/" class="text-xl font-bold text-white hover:text-gray-300 transition-colors">
                Toko Cahaya Makmur
            </a>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-button" class="md:hidden text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>

            <!-- Centered Navigation Links (Desktop) -->
            <div class="hidden md:flex space-x-6 mx-auto">
                <a href="{{ route('products.list.view') }}" class="hover:text-gray-300 transition-colors">Products</a>
                <a href="{{ route('brands.list.view') }}" class="hover:text-gray-300 transition-colors">Brands</a>
                <a href="{{ route('reviews.list.view') }}" class="hover:text-gray-300 transition-colors">Review</a>
            </div>

            <!-- Auth Section -->
            <div class="hidden md:flex items-center">
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-white hover:text-gray-300 transition-colors">
                            Logout
                        </button>
                    </form>
                @endauth
                {{-- @else
                    <a href="{{ route('login') }}" class="hover:text-gray-300 transition-colors ml-4">Login</a>
                    <a href="{{ route('register') }}" class="hover:text-gray-300 transition-colors ml-4">Register</a>
                --}}
            </div>
        </div>

        <!-- Mobile Menu (Hidden by default) -->
        <div id="mobile-menu" class="md:hidden hidden mt-4 pb-4">
            <div class="flex flex-col space-y-4">
                <a href="{{ url('/index') }}" class="hover:text-gray-300 transition-colors">Products</a>
                
                <!-- Auth Links in Mobile -->
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-left text-white hover:text-gray-300 transition-colors">
                            Logout
                        </button>
                    </form>
                @endauth
                {{-- @else
                    <a href="{{ route('login') }}" class="hover:text-gray-300 transition-colors">Login</a>
                    <a href="{{ route('register') }}" class="hover:text-gray-300 transition-colors">Register</a>
                --}}
            </div>
        </div>
    </div>
</nav>