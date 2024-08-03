@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h1 class="mb-4">Banner Details</h1>

        <div class="card">
            <div class="card-header">
                <h4>{{ $banner->title }}</h4>
            </div>
            <div class="card-body">
                <img src="{{ asset('storage/' . $banner->image_path) }}" width="200" alt="Banner Image" class="mb-3">
                <p><strong>Description:</strong> {{ $banner->description }}</p>
                <p><strong>Link:</strong> <a href="{{ $banner->link }}" target="_blank">{{ $banner->link }}</a></p>
                <p><strong>Active:</strong> {{ $banner->active ? 'Yes' : 'No' }}</p>
                <a href="{{ route('admin.banners.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
@endsection
