<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">HoopsCloth</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Centered navigation links -->
            <div class="navbar-nav mx-auto">
                {{-- <a class="nav-link" href="{{ route('product.list.view') }}">Product</a>
                <a class="nav-link" href="{{ route('brand.list.view') }}">Brand</a>
                <a class="nav-link" href="{{ route('category.list.view') }}">Category</a> --}}
            </div>

            <div class="navbar-nav ">
                @auth
                    @if (auth()->user()->status == 'admin')
                        <a class="nav-link" href="{{ route('index') }}">Back</a>
                    @endif
                @endauth
            </div>

            <!-- Auth links on the right -->
            <div class="navbar-nav">
                @auth
                    <!-- Simple logout button -->
                    {{-- <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link text-light p-0" style="border: none; background: none;">
                            Logout
                        </button>
                    </form> --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn nav-link" type="submit">
                            Logout
                        </button>
                        {{-- <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            
                        </x-responsive-nav-link> --}}
                    </form>
                @endauth
                {{-- @else
                    <!-- Show login/register when not authenticated -->
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                    <a class="nav-link" href="{{ route('register') }}">Register</a> --}}
            </div>
        </div>
    </div>
</nav>
