@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>{{ __('List Suppliers') }}</h4>
                    <a href="{{ route('suppliers.create.view') }}" class="btn btn-primary">
                        {{ __('Create New Supplier') }}
                    </a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    @if ($suppliers->isEmpty())
                        <div class="alert alert-info">No suppliers found.</div>
                    @else
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Supplier Name</th>
                                    <th>Company Name</th> {{-- Diubah --}}
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($suppliers as $supplier)
                                    <tr>
                                        <td>{{ $supplier->id }}</td>
                                        <td>{{ $supplier->SupplierName }}</td>
                                        <td>{{ $supplier->CompanyName }}</td> {{-- Diubah --}}
                                        <td>{{ $supplier->created_at->format('Y-m-d H:i') }}</td>
                                        <td> 
                                            <a href="{{ route('suppliers.update.view', $supplier->id) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                            
                                            <form action="{{ route('suppliers.delete', $supplier->id) }}" method="POST"
                                                class="d-inline"> 
                                                @csrf 
                                                @method('DELETE') 
                                                <button type="submit"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this supplier?')">Delete</button> 
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection