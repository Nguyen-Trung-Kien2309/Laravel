@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h1 class="mb-4">Promotions</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('admin.promotions.create') }}" class="btn btn-primary mb-3">Create Promotion</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Discount Percentage</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($promotions as $promotion)
                    <tr>
                        <td>{{ $promotion->id }}</td>
                        <td>{{ $promotion->name }}</td>
                        <td>{{ $promotion->discount_percentage }}%</td>
                        <td>{{ $promotion->start_date }}</td>
                        <td>{{ $promotion->end_date }}</td>
                        <td>
                            <a href="{{ route('admin.promotions.show', $promotion) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('admin.promotions.edit', $promotion) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.promotions.destroy', $promotion) }}" method="POST" class="d-inline">
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
