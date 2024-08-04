@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tạo Mã giảm giá mới</h1>
    <form action="{{ route('coupons.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="code">Mã</label>
            <input type="text" class="form-control" id="code" name="code" value="{{ old('code') }}" required>
        </div>
        <div class="form-group">
            <label for="discount_amount">Số tiền giảm</label>
            <input type="number" class="form-control" id="discount_amount" name="discount_amount" value="{{ old('discount_amount') }}">
        </div>
        <div class="form-group">
            <label for="discount_percent">Phần trăm giảm</label>
            <input type="number" class="form-control" id="discount_percent" name="discount_percent" value="{{ old('discount_percent') }}" min="0" max="100">
        </div>
        <div class="form-group">
            <label for="usage_limit">Giới hạn sử dụng</label>
            <input type="number" class="form-control" id="usage_limit" name="usage_limit" value="{{ old('usage_limit') }}">
        </div>
        <div class="form-group">
            <label for="expires_at">Ngày hết hạn</label>
            <input type="date" class="form-control" id="expires_at" name="expires_at" value="{{ old('expires_at') }}">
        </div>
        <button type="submit" class="btn btn-primary">Tạo mới</button>
    </form>
</div>
@endsection
