@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Supplier') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('suppliers.update', $supplier->id) }}">
                        @csrf
                        @method('PUT')

                        {{-- Supplier Name --}}
                        <div class="row mb-3">
                            <label for="SupplierName" class="col-md-4 col-form-label text-md-end">{{ __('Supplier Name') }}</label>
                            <div class="col-md-6">
                                <input id="SupplierName" type="text" class="form-control @error('SupplierName') is-invalid @enderror" name="SupplierName" value="{{ old('SupplierName', $supplier->SupplierName) }}" required autocomplete="SupplierName" autofocus>
                                @error('SupplierName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Company Name (Baru/Perbaikan) --}}
                        <div class="row mb-3">
                            <label for="CompanyName" class="col-md-4 col-form-label text-md-end">{{ __('Company Name') }}</label>
                            <div class="col-md-6">
                                <input id="CompanyName" 
                                       type="text" 
                                       class="form-control @error('CompanyName') is-invalid @enderror" 
                                       name="CompanyName" 
                                       value="{{ old('CompanyName', $supplier->CompanyName) }}" 
                                       required 
                                       autocomplete="CompanyName">
                                @error('CompanyName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Supplier') }}
                                </button>
                                <a href="{{ route('suppliers.list.view') }}" class="btn btn-secondary">
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