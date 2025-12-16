@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>{{ __('Product List') }}</h4>
                    <a href="{{ route('products.create.view') }}" class="btn btn-primary">
                        {{ __('Add New Product') }}
                    </a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    @if ($products->isEmpty())
                        <div class="alert alert-info">No products found.</div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Brand</th>
                                        <th>Category</th>
                                        <th>Type</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>
                                                @if($product->Image)
                                                    <img src="{{ asset('storage/' . $product->Image) }}" alt="{{ $product->ProductName }}" style="width: 50px; height: 50px; object-fit: cover;">
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>{{ $product->ProductName }}</td>
                                            <td>Rp{{ number_format($product->Price, 0, ',', '.') }}</td>
                                            <td>{{ $product->ProductQuantity }}</td>
                                            <td>{{ $product->Brand->BrandName ?? 'N/A' }}</td>
                                            <td>{{ $product->ProductCategory->ProductCategoryName ?? 'N/A' }}</td>
                                            <td>{{ $product->ProductType->ProductTypeName ?? 'N/A' }}</td>
                                            <td> 
                                                <a href="{{ route('products.update.view', $product->id) }}"
                                                    class="btn btn-sm btn-warning">Edit</a>
                                                
                                                <form action="{{ route('products.delete', $product->id) }}" method="POST"
                                                    class="d-inline"> 
                                                    @csrf 
                                                    @method('DELETE') 
                                                    <button type="submit"
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this product?')">Delete</button> 
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection