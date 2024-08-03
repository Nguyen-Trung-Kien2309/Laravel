@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit Promotion</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.promotions.update', $promotion) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $promotion->name) }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control">{{ old('description', $promotion->description) }}</textarea>
            </div>
            <div class="form-group">
                <label for="discount_percentage">Discount Percentage</label>
                <input type="number" name="discount_percentage" id="discount_percentage" class="form-control" value="{{ old('discount_percentage', $promotion->discount_percentage) }}" required>
            </div>
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date', $promotion->start_date->format('Y-m-d')) }}" required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date', $promotion->end_date->format('Y-m-d')) }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
