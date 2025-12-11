@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Brand') }}</div>

                <div class="card-body">
                    {{-- Form action diarahkan ke route PUT dengan ID Brand --}}
                    <form method="POST" action="{{ route('brands.update', $brand->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="BrandName" class="col-md-4 col-form-label text-md-end">{{ __('Brand Name') }}</label>

                            <div class="col-md-6">
                                {{-- Menggunakan old() dan $brand->BrandName untuk mengisi nilai lama --}}
                                <input id="BrandName" 
                                       type="text" 
                                       class="form-control @error('BrandName') is-invalid @enderror" 
                                       name="BrandName" 
                                       value="{{ old('BrandName', $brand->BrandName) }}" 
                                       required 
                                       autocomplete="BrandName" 
                                       autofocus>

                                @error('BrandName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Brand') }}
                                </button>
                                <a href="{{ route('brands.list.view') }}" class="btn btn-secondary">
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