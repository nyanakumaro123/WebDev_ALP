@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Create New Product') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- ROW 1: Name & Price --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="ProductName" class="col-form-label text-md-end">{{ __('Product Name') }}</label>
                                <input id="ProductName" type="text" class="form-control @error('ProductName') is-invalid @enderror" name="ProductName" value="{{ old('ProductName') }}" required autofocus>
                                @error('ProductName') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="Price" class="col-form-label text-md-end">{{ __('Price') }}</label>
                                <input id="Price" type="number" step="0.01" class="form-control @error('Price') is-invalid @enderror" name="Price" value="{{ old('Price') }}" required>
                                @error('Price') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div>

                        {{-- ROW 2: Quantity & Category --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="ProductQuantity" class="col-form-label text-md-end">{{ __('Quantity') }}</label>
                                <input id="ProductQuantity" type="number" class="form-control @error('ProductQuantity') is-invalid @enderror" name="ProductQuantity" value="{{ old('ProductQuantity') }}" required>
                                @error('ProductQuantity') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="ProducCategoryID" class="col-form-label text-md-end">{{ __('Category') }}</label>
                                <select id="ProducCategoryID" class="form-control @error('ProducCategoryID') is-invalid @enderror" name="ProducCategoryID" required>
                                    <option value="">Select Category</option>
                                    @foreach($productCategories as $category)
                                        <option value="{{ $category->id }}" {{ old('ProducCategoryID') == $category->id ? 'selected' : '' }}>
                                            {{ $category->ProductCategoryName }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('ProducCategoryID') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div>

                        {{-- ROW 3: Brand & Product Type --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="BrandID" class="col-form-label text-md-end">{{ __('Brand') }}</label>
                                <select id="BrandID" class="form-control @error('BrandID') is-invalid @enderror" name="BrandID" required>
                                    <option value="">Select Brand</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}" {{ old('BrandID') == $brand->id ? 'selected' : '' }}>
                                            {{ $brand->BrandName }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('BrandID') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div>

                        {{-- ROW 4: Supplier (Hidden/Default Value jika tidak ada di form) & Image --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="SupplierID" class="col-form-label text-md-end">{{ __('Supplier') }}</label>
                                <select id="SupplierID" class="form-control @error('SupplierID') is-invalid @enderror" name="SupplierID" required>
                                    <option value="">Select Supplier</option>
                                    @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}" {{ old('SupplierID') == $supplier->id ? 'selected' : '' }}>
                                            {{ $supplier->SupplierName }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('SupplierID') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="Image" class="col-form-label text-md-end">{{ __('Product Image') }}</label>
                                <input id="Image" type="file" class="form-control @error('Image') is-invalid @enderror" name="Image" required>
                                @error('Image') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save Product') }}
                                </button>
                                <a href="{{ route('products.list.view') }}" class="btn btn-secondary">
                                    {{ __('Cancel') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection