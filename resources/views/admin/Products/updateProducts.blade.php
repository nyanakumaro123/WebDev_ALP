@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto my-10 p-8 bg-white rounded-2xl shadow-lg border border-gray-100">
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-900">Update Produk</h2>
        <p class="text-gray-500 text-sm">Sedang mengedit: <span class="font-bold">{{ $product->ProductName }}</span></p>
    </div>

    {{-- Arahkan ke route update dengan ID produk --}}
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT') 
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Nama Produk --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700">Nama Produk</label>
                <input type="text" name="ProductName" value="{{ old('ProductName', $product->ProductName) }}" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>
            
            {{-- Harga --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700">Harga</label>
                <input type="number" name="Price" value="{{ old('Price', $product->Price) }}" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>
            
            {{-- Jumlah Stok --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700">Jumlah Stok</label>
                <input type="number" name="ProductQuantity" value="{{ old('ProductQuantity', $product->ProductQuantity) }}" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>
            
            {{-- Brand ID --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700">Brand</label>
                <select name="BrandID" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}" {{ $brand->id == old('BrandID', $product->BrandID) ? 'selected' : '' }}>{{ $brand->BrandName }}</option>
                    @endforeach
                </select>
            </div>
            
            {{-- Product Category ID --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700">Kategori Produk</label>
                <select name="ProducCategoryID" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                    @foreach($productCategories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == old('ProducCategoryID', $product->ProducCategoryID) ? 'selected' : '' }}>{{ $category->CategoryName }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Product Type ID --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700">Tipe Produk</label>
                <select name="ProductTypeID" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                    @foreach($productTypes as $type)
                        <option value="{{ $type->id }}" {{ $type->id == old('ProductTypeID', $product->ProductTypeID) ? 'selected' : '' }}>{{ $type->TypeName }}</option>
                    @endforeach
                </select>
            </div>
            
            {{-- Image (Optional Update) --}}
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700">Ganti Gambar Produk (Biarkan kosong jika tidak diubah)</label>
                <input type="file" name="Image" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                @if($product->Image)
                    <p class="text-xs text-gray-500 mt-2">Gambar saat ini: <img src="{{ asset('storage/' . $product->Image) }}" class="h-10 w-10 inline-block object-cover border rounded-md"></p>
                @endif
            </div>

        </div>

        <div class="flex space-x-4 pt-6">
            <a href="{{ route('products.list.view') }}" class="w-1/2 text-center py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 font-semibold">Batal</a>
            <button type="submit" class="w-1/2 bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 rounded-lg shadow-md transition-all">Update Perubahan</button>
        </div>
    </form>
</div>
@endsection