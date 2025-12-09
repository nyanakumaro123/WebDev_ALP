@extends('layouts.app') 

@section('content')

<div class="max-w-xl mx-auto my-12 p-8 bg-white rounded-2xl shadow-xl border border-gray-100">
    <div class="text-center mb-10">
        <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Bagikan Pengalaman Anda</h2>
        <p class="mt-2 text-gray-500">Masukan Anda sangat berarti bagi perkembangan produk kami.</p>
    </div>

    <form action="{{ route('reviews.store') }}" method="POST" class="space-y-8">
        @csrf
        
        <div class="flex flex-col items-center">
            <label class="text-sm font-semibold text-gray-600 uppercase tracking-wider mb-4">Rating Produk</label>
            <div class="flex flex-row-reverse justify-center group">
                @for ($i = 5; $i >= 1; $i--)
                    <input type="radio" id="star{{ $i }}" name="Rating" value="{{ $i }}" class="hidden peer" required>
                    <label for="sxtar{{ $i }}" class="cursor-pointer text-gray-300 hover:text-yellow-400 peer-checked:text-yellow-500 transition-colors duration-200">
                        <svg class="w-10 h-10 fill-current" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    </label>
                @endfor
            </div>
            @error('Rating') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="Comment" class="block text-sm font-semibold text-gray-700 mb-2">Ulasan Tertulis</label>
            <textarea 
                id="Comment" 
                name="Comment" 
                rows="5" 
                placeholder="Apa yang membuat Anda puas atau kurang puas?" 
                class="block w-full px-4 py-3 rounded-xl border-gray-300 border focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm transition-all duration-200 placeholder:text-gray-400"
                required
            ></textarea>
            @error('Comment') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
        </div>

        <button 
            type="submit" 
            class="w-full flex justify-center items-center px-6 py-4 bg-indigo-600 hover:bg-indigo-700 text-white text-lg font-bold rounded-xl shadow-lg hover:shadow-indigo-200 transition-all transform active:scale-95 focus:outline-none focus:ring-4 focus:ring-indigo-200"
        >
            <span>Kirim Ulasan</span>
            <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
            </svg>
        </button>
    </form>
</div>

@endsection