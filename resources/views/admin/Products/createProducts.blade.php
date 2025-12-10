@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto my-10 p-8 bg-white rounded-2xl shadow-lg border border-gray-100">
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-900">Tambah Produk Baru</h2>
        <p class="text-gray-500">Lengkapi formulir di bawah untuk menambahkan unit ke inventaris.</p>
    </div>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- ATRIBUT YANG SUDAH ADA --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700">Nama Produk</label>
                <input type="text" name="ProductName" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700">Harga</label>
                <input type="number" name="Price" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700">Jumlah Stok</label>
                {{-- Di model Anda menggunakan "ProductQuantity" --}}
                <input type="number" name="ProductQuantity" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>

            {{-- ATRIBUT BARU: BrandID --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700">Brand</label>
                <select name="BrandID" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                    {{-- Loop data Brand di sini --}}
                </select>
            </div>

            {{-- ATRIBUT BARU: ProducCategoryID --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700">Kategori Produk</label>
                <select name="ProducCategoryID" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                    {{-- Loop data ProductCategory di sini --}}
                </select>
            </div>
            
            {{-- ATRIBUT SUDAH ADA: ProductTypeID (Tipe Produk) --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700">Tipe Produk</label>
                <select name="ProductTypeID" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                    {{-- Loop data ProductType di sini --}}
                </select>
            </div>
            
            {{-- ATRIBUT BARU: Image --}}
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700">Gambar Produk (Image)</label>
                <input type="file" name="Image" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" required>
            </div>

        </div>

        <div class="pt-6">
            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 rounded-lg shadow-md transition-all">Simpan Produk</button>
        </div>
    </form>
</div>
@endsection