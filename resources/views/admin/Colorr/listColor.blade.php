@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>{{ ('Colors') }}</h4>
                    <a href="{{ route('color.create.view') }}" class="btn btn-primary">
                        {{ ('Create New Color') }}
                    </a>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    
                    @if($colors->isEmpty())
                        <div class="alert alert-info">No colors found.</div>
                    @else
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Color Name</th>
                                    <th>Color Code</th>
                                    <th>Category</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($colors as $color)
                                <tr>
                                    <td>{{ $color->id }}</td>
                                    <td>{{ $color->ColorName }}</td>
                                    <td>
                                        <span style="display: inline-block; width: 20px; height: 20px; 
                                              background-color: {{ $color->ColorCode }}; border: 1px solid #ccc;"></span>
                                        {{ $color->ColorCode }}
                                    </td>
                                    <td>{{ $color->ColorCategory->ColorCategoryName }}</td>
                                    <td>{{ $color->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        <a href="{{ route('color.update.view', $color) }}" 
                                           class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('color.delete', $color) }}" 
                                              method="POST" class="d-inline">
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
            </div>
        </div>
    </div>
</div>
@endsection