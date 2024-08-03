@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit Banner</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.banners.update', $banner) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $banner->title) }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control">{{ old('description', $banner->description) }}</textarea>
            </div>
            <div class="form-group">
                <label for="image_path">Image</label>
                <input type="file" name="image_path" id="image_path" class="form-control-file">
                <img src="{{ asset('storage/' . $banner->image_path) }}" width="100" alt="Current Image">
            </div>
            <div class="form-group">
                <label for="link">Link</label>
                <input type="url" name="link" id="link" class="form-control" value="{{ old('link', $banner->link) }}">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" name="active" id="active" class="form-check-input" {{ old('active', $banner->active) ? 'checked' : '' }}>
                <label for="active" class="form-check-label">Active</label>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
