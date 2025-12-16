@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>{{ 'Product Categories' }}</h4>
                        <a href="{{ route('product.category.create.view') }}" class="btn btn-primary">
                            {{ 'Create New Category' }}
                        </a>
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if ($productCategories->isEmpty())
                            <div class="alert alert-info">No product categories found.</div>
                        @else
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Name</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productCategories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->ProductCategoryName }}</td>
                                            <td>{{ $category->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                <a href="{{ route('product.category.update.view', $category->id) }}"
                                                    class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('delete.product.category', $category->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>

                    
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>{{ __('List Product Categories') }}</h4>
                    <a href="{{ route('product.category.create.view') }}" class="btn btn-primary">
                        {{ __('Create New Category') }}
                    </a>
                </div>

                <div class="card-body"> --}}


                    {{-- Display Success/Error Messages --}}


                    {{-- @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    @if ($productCategories->isEmpty())
                        <div class="alert alert-info">No product categories found.</div>
                    @else
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category Name</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productCategories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->ProductCategoryName }}</td>
                                        <td>{{ $category->created_at->format('Y-m-d H:i') }}</td>
                                        <td>  --}}

                                            {{-- Link Edit --}}
                                            {{-- <a href="{{ route('product.category.update.view', $category->id) }}"
                                                class="btn btn-sm btn-warning">Edit</a> --}}
                                            
                                            {{-- Form Delete --}}
                                            {{-- <form action="{{ route('delete.product.category', $category->id) }}" method="POST"
                                                class="d-inline"> 
                                                @csrf 
                                                @method('DELETE') 
                                                <button type="submit"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this category?')">Delete</button> 
                                            </form> --}}


                                        {{-- </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif --}}
                </div>
            </div>
        </div>
    </div>
@endsection
