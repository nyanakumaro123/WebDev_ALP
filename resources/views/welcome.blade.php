<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toko Cahaya Makmur</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans antialiased text-gray-900">
    <nav class="fixed w-full z-50 top-0 bg-current backdrop-blur-md border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <div class="w-10 h-10 bg-black rounded-xl flex items-center justify-center shadow-md shadow-indigo-200">
                    <span class="text-white font-bold text-xl">C</span>
                </div>
                <span class="text-xl font-black tracking-tighter text-white uppercase">Cahaya Makmur</span>
            </div>

            <div class="flex items-center gap-3">
                @auth
                    <a href="{{ url('/admin-dashboard') }}" class="px-6 py-2.5 bg-black text-white rounded-full font-bold text-sm shadow-xl shadow-indigo-200 hover:bg-black transition-all active:scale-95">
                        Go to Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="px-6 py-2.5 bg-gray-900 text-white rounded-full font-bold text-sm shadow-md shadow-indigo-200 hover:bg-black transition-all active:scale-95"">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-6 py-2.5 bg-gray-900 text-white rounded-full font-bold text-sm shadow-md shadow-indigo-200 hover:bg-black transition-all active:scale-95">
                            Register
                        </a>
                    @endif
                @endauth
            </div>
        </div>
    </nav>

    <main class="pt-32 pb-20 px-6">
        <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center gap-16">
            <div class="lg:w-1/2 space-y-8">
                <div class="inline-flex items-center px-4 py-1.5 bg-indigo-50 border border-indigo-100 rounded-full">
                    <span class="text-black text-xs font-black uppercase tracking-widest">Since 1990</span>
                </div>
                
                <h1 class="text-6xl lg:text-7xl font-black text-gray-900 leading-[1.1] tracking-tighter">
                    Premium <span class="text-black">Supplies</span> for Your Needs.
                </h1>
                
                <p class="text-lg text-gray-500 leading-relaxed max-w-xl">
                    We provide Sepon mattresses, various types of furniture fabrics, imitation fabrics, and other supplies. The best quality directly from Surabaya.
                </p>

                <div class="flex gap-4 pt-4">
                    <a href="{{ route('login') }}" class="px-10 py-4 bg-gray-900 text-white rounded-2xl font-black text-lg shadow-2xl shadow-indigo-200 hover:scale-105 hover:bg-black transition-all">
                        Get Started
                    </a>
                </div>
            </div>

            <div class="lg:w-1/2 relative">
                <div class="absolute -inset-4 bg-indigo-600/10 rounded-[3rem] blur-3xl"></div>
                <div class="relative rounded-[2.5rem] overflow-hidden border-8 border-white shadow-2xl transform rotate-2 hover:rotate-0 transition-transform duration-700">
                    <img src="{{ asset('Background.png') }}" 
                         alt="Toko Cahaya Makmur" 
                         class="w-full aspect-[4/5] object-cover">
                    
                    <div class="absolute bottom-8 left-8 right-8 bg-white/90 backdrop-blur p-6 rounded-3xl shadow-xl border border-white">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-400 text-[10px] font-bold uppercase tracking-widest leading-none mb-1">Store Location</p>
                                <h3 class="font-black text-gray-900">Jl. Banyu Urip 113, Surabaya</h3>
                            </div>
                            <div class="w-12 h-12 bg-green-500 rounded-2xl flex items-center justify-center text-white shadow-lg">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>