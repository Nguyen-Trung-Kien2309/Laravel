<!-- resources/views/users/create.blade.php -->

@extends('admin.layouts.master')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">Create New User</h1>

        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
                @error('name')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" required>
                @error('email')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
                @error('password')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <input type="text" class="form-control" name="role" id="role" value="{{ old('role') }}">
            </div>

            <button type="submit" class="btn btn-primary">Create User</button>
        </form>
    </div>
@endsection
