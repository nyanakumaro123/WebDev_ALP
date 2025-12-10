@extends('layouts.app')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ ('Create Color Category') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('color.category.create') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="ColorCategoryName" class="col-md-4 col-form-label text-md-end">{{ ('Color Category Name') }}</label>

                            <div class="col-md-6">
                                <input id="ColorCategoryName" type="text" class="form-control @error('ColorCategoryName') is-invalid @enderror" name="ColorCategoryName" value="{{ old('ColorCategoryName') }}" required autocomplete="ColorCategoryName" autofocus>

                                @error('ColorCategoryName')
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
                                <a href="{{ route('color.list.view') }}" class="btn btn-secondary">
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
