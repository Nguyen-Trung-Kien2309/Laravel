@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h1>Chỉnh sửa Khuyến mại</h1>

    <!-- Hiển thị thông báo lỗi -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.promotions.update', $promotion->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="code">Mã khuyến mại:</label>
            <input type="text" name="code" id="code" class="form-control" value="{{ old('code', $promotion->code) }}" >
       
            @error('code')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror </div>
        <div class="form-group">
            <label for="title">Tên khuyến mại:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $promotion->title) }}" >
       
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror </div>
        <div class="form-group">
            <label for="description">Mô tả:</label>
            <textarea name="description" id="description" class="form-control" >{{ old('description', $promotion->description) }}</textarea>
        </div>
        <div class="form-group">
            <label for="discount">Giảm giá:</label>
            <input type="number" name="discount" id="discount" class="form-control" value="{{ old('discount', number_format($promotion->discount, 2, '.', '')) }}" step="0.01" >
            @error('discount')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="form-group">
            <label for="discount_type">Loại giảm giá:</label>
            <select name="discount_type" id="discount_type" class="form-control" >
                <option value="percentage" {{ old('discount_type', $promotion->discount_type) == 'percentage' ? 'selected' : '' }}>Percentage</option>
                <option value="fixed" {{ old('discount_type', $promotion->discount_type) == 'fixed' ? 'selected' : '' }}>Fixed Amount</option>
            </select>
            @error('discount_type')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="form-group">
            <label for="start_date">Ngày bắt đầu:</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date', $promotion->start_date instanceof \Carbon\Carbon ? $promotion->start_date->format('Y-m-d') : $promotion->start_date) }}" >
       
            @error('start_date')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror </div>
        <div class="form-group">
            <label for="end_date">Ngày kết thúc:</label>
            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date', $promotion->end_date instanceof \Carbon\Carbon ? $promotion->end_date->format('Y-m-d') : $promotion->end_date) }}" >
            @error('end_date')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="form-group form-check">
            <input type="checkbox" name="active" id="active" class="form-check-input" {{ old('active', $promotion->active) ? 'checked' : '' }}>
            <label for="active" class="form-check-label">Active</label>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật khuyến mại</button>
    </form>
</div>
@endsection
