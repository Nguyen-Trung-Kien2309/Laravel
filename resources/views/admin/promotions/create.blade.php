@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h1>Tạo Khuyến mại mới</h1>
    
    <!-- Hiển thị thông báo lỗi chung nếu có -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('admin.promotions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Tên khuyến mại:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" >
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Mô tả:</label>
            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="discount">Giảm giá:</label>
            <input type="number" name="discount" id="discount" class="form-control" value="{{ old('discount') }}" step="0.01">
            @error('discount')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="discount_type">Loại giảm giá:</label>
            <select name="discount_type" id="discount_type" class="form-control">
                <option value="percentage" {{ old('discount_type') == 'percentage' ? 'selected' : '' }}>Percentage</option>
                <option value="fixed" {{ old('discount_type') == 'fixed' ? 'selected' : '' }}>Fixed Amount</option>
            </select>
            @error('discount_type')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="start_date">Ngày bắt đầu:</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date') }}">
            @error('start_date')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="end_date">Ngày kết thúc:</label>
            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date') }}">
            @error('end_date')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group form-check">
            <input type="hidden" name="active" value="0">
            <input type="checkbox" name="active" id="active" class="form-check-input" value="1" {{ old('active') ? 'checked' : '' }}>
            <label for="active" class="form-check-label">Active</label>
        </div>
        
        <button type="submit" class="btn btn-primary">Lưu khuyến mại</button>
    </form>
</div>
@endsection
