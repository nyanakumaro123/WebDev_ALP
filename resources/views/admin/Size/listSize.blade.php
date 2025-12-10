@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>{{ __('Sizes') }}</h4>
                        <a href="{{ route('sizes.create') }}" class="btn btn-primary">
                            {{ __('Create New Size') }}
                        </a>
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if ($sizes->isEmpty())
                            <div class="alert alert-info">No sizes found.</div>
                        @else
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Size Value</th>
                                        <th>Category</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sizes as $size)
                                        <tr>
                                            <td>{{ $size->id }}</td>
                                            <td>{{ $size->SizeValue }}</td>
                                            <td>{{ $size->SizeCategory->SizeCategoryName }}</td>
                                            <td>{{ $size->created_at->format('Y-m-d') }}</td>
                                            <td> <a href="{{ route('sizes.edit', $size) }}"
                                                    class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('sizes.destroy', $size) }}" method="POST"
                                                    class="d-inline"> @csrf @method('DELETE') <button type="submit"
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure?')">Delete</button> </form>
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
</div> @endsection
