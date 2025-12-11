@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto my-10">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Daftar Kategori Ukuran</h2>
        
        {{-- FIX: Menggunakan 'size.category.create.view' (Singular) --}}
        <a href="{{ route('size.category.create.view') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm font-bold shadow-sm transition-colors">
            + Tambah Kategori
        </a>
    </div>

    <div class="overflow-hidden bg-white rounded-xl shadow border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider w-1/4">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider w-1/2">Nama Kategori</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider w-1/4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @forelse($sizecategories as $category)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $category->id }}</td>
                    
                    {{-- Nama Kategori (Diasumsikan sudah benar: SizeCategoryName) --}}
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-semibold">{{ $category->SizeCategoryName }}</td> 
                    
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                        <div class="flex justify-center space-x-3">
                            {{-- FIX: Menggunakan 'size.category.update.view' (Singular) --}}
                            <a href="{{ route('size.category.update.view', $category->id) }}" class="text-indigo-600 hover:text-indigo-900 font-medium">Edit</a>
                            
                            {{-- FIX: Menggunakan 'size.category.delete' (Singular) --}}
                            <form action="{{ route('size.category.delete', $category->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 font-medium">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-6 py-4 text-center text-gray-500 text-sm italic">Belum ada data kategori ukuran yang tersedia.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection