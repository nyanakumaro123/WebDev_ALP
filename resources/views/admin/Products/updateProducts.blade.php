@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Edit Product: ') . $product->ProductName }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- ROW 1: Name & Price --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="ProductName" class="col-form-label text-md-end">{{ __('Product Name') }}</label>
                                <input id="ProductName" type="text" class="form-control @error('ProductName') is-invalid @enderror" name="ProductName" value="{{ old('ProductName', $product->ProductName) }}" required autofocus>
                                @error('ProductName') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="Price" class="col-form-label text-md-end">{{ __('Price') }}</label>
                                <input id="Price" type="number" step="0.01" class="form-control @error('Price') is-invalid @enderror" name="Price" value="{{ old('Price', $product->Price) }}" required>
                                @error('Price') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div>

                        {{-- ROW 2: Quantity & Category --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="ProductQuantity" class="col-form-label text-md-end">{{ __('Quantity') }}</label>
                                <input id="ProductQuantity" type="number" class="form-control @error('ProductQuantity') is-invalid @enderror" name="ProductQuantity" value="{{ old('ProductQuantity', $product->ProductQuantity) }}" required>
                                @error('ProductQuantity') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="ProducCategoryID" class="col-form-label text-md-end">{{ __('Category') }}</label>
                                <select id="ProducCategoryID" class="form-control @error('ProducCategoryID') is-invalid @enderror" name="ProducCategoryID" required>
                                    <option value="">Select Category</option>
                                    @foreach($productCategories as $category)
                                        <option value="{{ $category->id }}" {{ old('ProducCategoryID', $product->ProducCategoryID) == $category->id ? 'selected' : '' }}>
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
                                        <option value="{{ $brand->id }}" {{ old('BrandID', $product->BrandID) == $brand->id ? 'selected' : '' }}>
                                            {{ $brand->BrandName }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('BrandID') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="ProductTypeID" class="col-form-label text-md-end">{{ __('Product Type') }}</label>
                                <select id="ProductTypeID" class="form-control @error('ProductTypeID') is-invalid @enderror" name="ProductTypeID" required>
                                    <option value="">Select Type</option>
                                    @foreach($productTypes as $type)
                                        <option value="{{ $type->id }}" {{ old('ProductTypeID', $product->ProductTypeID) == $type->id ? 'selected' : '' }}>
                                            {{ $type->ProductTypeName }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('ProductTypeID') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div>

                        {{-- ROW 4: Supplier & Image --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="SupplierID" class="col-form-label text-md-end">{{ __('Supplier') }}</label>
                                <select id="SupplierID" class="form-control @error('SupplierID') is-invalid @enderror" name="SupplierID" required>
                                    <option value="">Select Supplier</option>
                                    @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}" {{ old('SupplierID', $product->SupplierID) == $supplier->id ? 'selected' : '' }}>
                                            {{ $supplier->SupplierName }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('SupplierID') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="Image" class="col-form-label text-md-end">{{ __('New Image (Optional)') }}</label>
                                <input id="Image" type="file" class="form-control @error('Image') is-invalid @enderror" name="Image">
                                @error('Image') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                
                                @if($product->Image)
                                <div class="mt-2">
                                    <small class="text-muted">Current Image:</small><br>
                                    <img src="{{ asset('storage/' . $product->Image) }}" alt="{{ $product->ProductName }}" style="width: 80px; height: 80px; object-fit: cover; border: 1px solid #ccc;">
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Product') }}
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