@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h1>Chi tiết Khuyến mại</h1>
    <a href="{{ route('admin.promotions.index') }}" class="btn btn-primary mb-3">Quay lại danh sách</a>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tên khuyến mại: {{ $promotion->title }}</h5>
            <p class="card-text"><strong>Mô tả:</strong> {{ $promotion->description }}</p>
            <p class="card-text"><strong>Giảm giá:</strong> {{ $promotion->discount }} {{ $promotion->discount_type == 'percentage' ? '%' : 'đ' }}</p>
            <p class="card-text"><strong>Loại giảm giá:</strong> {{ ucfirst($promotion->discount_type) }}</p>
            <p class="card-text"><strong>Ngày bắt đầu:</strong> {{ \Carbon\Carbon::parse($promotion->start_date)->format('d-m-Y') }}</p>
            <p class="card-text"><strong>Ngày kết thúc:</strong> {{ \Carbon\Carbon::parse($promotion->end_date)->format('d-m-Y') }}</p>
            <p class="card-text"><strong>Trạng thái:</strong> {{ $promotion->isActive() ? 'Đang hoạt động' : 'Không hoạt động' }}</p>
        </div>
    </div>
</div>
@endsection
