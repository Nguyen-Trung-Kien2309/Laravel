@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h1 class="mb-4">Create Banner</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
            </div>
            <div class="form-group">
                <label for="image_path">Image</label>
                <input type="file" name="image_path" id="image_path" class="form-control-file" required>
            </div>
            <div class="form-group">
                <label for="link">Link</label>
                <input type="url" name="link" id="link" class="form-control" value="{{ old('link') }}">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" name="active" id="active" class="form-check-input" {{ old('active') ? 'checked' : '' }}>
                <label for="active" class="form-check-label">Active</label>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
