@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h1 class="mb-4">Banners</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('admin.banners.create') }}" class="btn btn-primary mb-3">Create Banner</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($banners as $banner)
                    <tr>
                        <td>{{ $banner->id }}</td>
                        <td>{{ $banner->title }}</td>
                        <td><img src="{{ asset('storage/' . $banner->image_path) }}" width="100" alt="Banner Image"></td>
                        <td>{{ $banner->active ? 'Yes' : 'No' }}</td>
                        <td>
                            <a href="{{ route('admin.banners.show', $banner) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('admin.banners.edit', $banner) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.banners.destroy', $banner) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
