<!-- resources/views/users/show.blade.php -->

@extends('admin.layouts.master')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">User Details</h1>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">{{ $user->name }}</h5>
            </div>
            <div class="card-body">
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Role:</strong> {{ $user->role }}</p>
               
                <p><strong>Created At:</strong> {{ \Carbon\Carbon::parse($user->created_at)->format('Y-d-m H:i:s') }}</p>
                <p><strong>Updated At:</strong> {{ \Carbon\Carbon::parse($user->updated_at)->format('Y-d-m H:i:s') }}</p>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back to List</a>
                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
@endsection
