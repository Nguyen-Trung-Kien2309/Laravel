@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h1>Chi tiết Hóa đơn #{{ $invoice->id }}</h1>
    <a href="{{ route('admin.invoices.index') }}" class="btn btn-primary mb-3">Quay lại danh sách</a>
    <a href="{{ route('admin.invoices.print', $invoice->id) }}" class="btn btn-primary mb-3">In hóa đơn</a>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Thông tin người đặt hàng</h5>
            <p class="card-text"><strong>Tên:</strong> {{ $invoice->user_name }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $invoice->user_email }}</p>
            <p class="card-text"><strong>Số điện thoại:</strong> {{ $invoice->user_phone }}</p>
            <p class="card-text"><strong>Địa chỉ:</strong> {{ $invoice->user_address }}</p>
            
            <h5 class="card-title mt-4">Thông tin người nhận hàng</h5>
            <p class="card-text"><strong>Tên:</strong> {{ $invoice->receiver_name }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $invoice->receiver_email }}</p>
            <p class="card-text"><strong>Số điện thoại:</strong> {{ $invoice->receiver_phone }}</p>
            <p class="card-text"><strong>Địa chỉ:</strong> {{ $invoice->receiver_address }}</p>

            <h5 class="card-title mt-4">Thông tin hóa đơn</h5>
            <p class="card-text"><strong>Trạng thái đơn hàng:</strong> {{ $invoice::ORDER_STATUS[$invoice->order_status] }}</p>
            <p class="card-text"><strong>Trạng thái thanh toán:</strong> {{ $invoice::PAYMENT_STATUS[$invoice->payment_status] }}</p>
            <p class="card-text"><strong>Tổng tiền:</strong> {{ number_format($invoice->total_price, 2) }} đ</p>
        </div>
    </div>

    <h2 class="mt-4">Sản phẩm trong hóa đơn</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>SKU</th>
                <th>Giá</th>
                <th>Giá khuyến mại</th>
                <th>Kích thước</th>
                <th>Màu sắc</th>
                <th>Số lượng</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoice->orderItems as $item)
            <tr>
                <td>
                    <img src="{{ asset('storage/' . $item->product_img_thumb) }}" alt="{{ $item->product_name }}" width="50">
                </td>
                <td>{{ $item->product_name }}</td>
                <td>{{ $item->product_sku }}</td>
                <td>{{ number_format($item->product_price, 2) }} đ</td>
                <td>{{ number_format($item->product_price_sale, 2) }} đ</td>
                <td>{{ $item->variant_size_name }}</td>
                <td>{{ $item->variant_color_name }}</td>
                <td>{{ $item->quantity }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
