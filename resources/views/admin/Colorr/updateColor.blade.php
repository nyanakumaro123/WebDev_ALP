@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ ('Edit Color') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('color.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="ColorName" class="col-md-4 col-form-label text-md-end">{{ ('Color Name') }}</label>

                            <div class="col-md-6">
                                <input id="ColorName" type="text" class="form-control @error('ColorName') is-invalid @enderror" name="ColorName" value="{{ old('ColorName', $color->ColorName) }}" required autocomplete="ColorName" autofocus>

                                @error('ColorName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ColorCategoryID" class="col-md-4 col-form-label text-md-end">{{ ('Color Category') }}</label>

                            <div class="col-md-6">
                                <select id="ColorCategoryID" class="form-control @error('ColorCategoryID') is-invalid @enderror" name="ColorCategoryID" required>
                                    <option value="">Select Category</option>
                                    @foreach($colorCategories as $category)
                                        <option value="{{ $category->id }}" {{ old('ColorCategoryID', $color->ColorCategoryID) == $category->id ? 'selected' : '' }}>
                                            {{ $category->ColorCategoryName }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('ColorCategoryID')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ ('Update') }}
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
@endsection