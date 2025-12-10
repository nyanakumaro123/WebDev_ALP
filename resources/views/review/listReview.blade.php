@extends('layouts.app') 

@section('content')

<div class="max-w-4xl mx-auto my-12 p-6 bg-white rounded-2xl shadow-sm border border-gray-100">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Ulasan Pelanggan</h2>
            <p class="text-sm text-gray-500 mt-1">Melihat apa yang dikatakan pengguna lain tentang pengalaman mereka.</p>
        </div>
        <div class="flex items-center space-x-2 bg-indigo-50 px-4 py-2 rounded-lg">
            <span class="text-indigo-700 font-bold">4.8</span>
            <div class="flex text-yellow-400">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
            </div>
            <span class="text-gray-400 text-xs">(128 Ulasan)</span>
        </div>
    </div>

    <div class="space-y-6">
        @foreach($reviews as $review)
        <div class="p-6 bg-gray-50 rounded-xl border border-transparent hover:border-indigo-100 transition-all duration-200">
            <div class="flex justify-between items-start">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-bold text-lg uppercase">
                        {{ substr($review->User->name, 0, 1) }}
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900">{{ $review->User->name }}</h4>
                        <p class="text-xs text-gray-400">{{ $review->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                
                <div class="flex text-yellow-400 bg-white px-2 py-1 rounded-md shadow-sm border border-gray-100">
                    @for($i = 1; $i <= 5; $i++)
                        <svg class="w-4 h-4 {{ $i <= $review->Rating ? 'fill-current' : 'text-gray-200' }}" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    @endfor
                </div>
            </div>

            <div class="mt-4">
                <p class="text-gray-700 leading-relaxed italic">
                    "{{ $review->Comment }}"
                </p>
            </div>
            
            <div class="mt-4 flex space-x-2">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                    <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-green-400" fill="currentColor" viewBox="0 0 8 8"><circle cx="4" cy="4" r="3" /></svg>
                    Pembelian Terverifikasi
                </span>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection