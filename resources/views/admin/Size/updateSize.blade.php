@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ ('Edit Size') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('size.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="SizeValue" class="col-md-4 col-form-label text-md-end">{{ ('Size Value') }}</label>

                            <div class="col-md-6">
                                <input id="SizeValue" type="text" class="form-control @error('SizeValue') is-invalid @enderror" name="SizeValue" value="{{ old('SizeValue', $size->SizeValue) }}" required autocomplete="SizeValue" autofocus>

                                @error('SizeValue')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="SizeCategoryID" class="col-md-4 col-form-label text-md-end">{{ ('Size Category') }}</label>

                            <div class="col-md-6">
                                <select id="SizeCategoryID" class="form-control @error('SizeCategoryID') is-invalid @enderror" name="SizeCategoryID" required>
                                    <option value="">Select Category</option>
                                    @foreach($sizeCategories as $category)
                                        <option value="{{ $category->id }}" {{ old('SizeCategoryID', $size->SizeCategoryID) == $category->id ? 'selected' : '' }}>
                                            {{ $category->SizeCategoryName }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('SizeCategoryID')
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