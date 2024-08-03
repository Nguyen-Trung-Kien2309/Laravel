@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h1 class="mb-4">Promotion Details</h1>

        <div class="card">
            <div class="card-header">
                <h4>{{ $promotion->name }}</h4>
            </div>
            <div class="card-body">
                <p><strong>Description:</strong> {{ $promotion->description }}</p>
                <p><strong>Discount Percentage:</strong> {{ $promotion->discount_percentage }}%</p>
                <p><strong>Start Date:</strong> {{ $promotion->start_date->format('Y-m-d') }}</p>
                <p><strong>End Date:</strong> {{ $promotion->end_date->format('Y-m-d') }}</p>
                <a href="{{ route('admin.promotions.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
@endsection
