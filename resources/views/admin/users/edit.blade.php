@extends('admin.layouts.master')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">Edit User</h1>

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $user->name) }}" required>
                @error('name')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $user->email) }}" required>
                @error('email')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
                @error('password')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-control" name="role" id="role">
                    @foreach ($roles as $key => $role)
                        <option value="{{ $key }}" {{ old('role', $user->role) == $key ? 'selected' : '' }}>
                            {{ $role }}
                        </option>
                    @endforeach
                </select>
                @error('role')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            <button type="submit" class="btn btn-primary">Update User</button>
        </form>
    </div>
@endsection
