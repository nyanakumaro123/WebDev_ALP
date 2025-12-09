@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ ('Create Size Category') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('size.category.create') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="SizeCategoryName" class="col-md-4 col-form-label text-md-end">{{ ('Size Category Name') }}</label>

                            <div class="col-md-6">
                                <input id="SizeCategoryName" type="text" class="form-control @error('SizeCategoryName') is-invalid @enderror" name="SizeCategoryName" value="{{ old('SizeCategoryName') }}" required autocomplete="SizeCategoryName" autofocus>

                                @error('SizeCategoryName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ ('Create') }}
                                </button>
                                <a href="{{ route('size.list.view') }}" class="btn btn-secondary">
                                    {{ ('Cancel') }}
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