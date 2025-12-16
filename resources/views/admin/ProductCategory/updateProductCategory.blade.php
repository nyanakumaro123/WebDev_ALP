@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ 'Edit Product Category' }}</div>

                    <div class="card-body">
                        <form action="{{ route('update.product.category', $productCategory->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label for="ProductCategoryName"
                                    class="col-md-4 col-form-label text-md-end">{{ 'Category Name' }}</label>

                                <div class="col-md-6">
                                    <input id="ProductCategoryName" type="text"
                                        class="form-control @error('ProductCategoryName') is-invalid @enderror"
                                        name="ProductCategoryName"
                                        value="{{ old('ProductCategoryName', $productCategory->ProductCategoryName) }}"
                                        required autocomplete="ProductCategoryName" autofocus>

                                    @error('ProductCategoryName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ 'Update' }}
                                    </button>
                                    <a href="{{ route('product.category.list.view') }}" class="btn btn-secondary">
                                        {{ 'Cancel' }}
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
