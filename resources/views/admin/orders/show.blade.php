@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h1>Chi tiết Đơn hàng #{{ $order->id }}</h1>
    <a href="{{ route('admin.orders.index') }}" class="btn btn-primary mb-3">Quay lại danh sách</a>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Thông tin người đặt hàng</h5>
            <p class="card-text"><strong>Tên:</strong> {{ $order->user_name }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $order->user_email }}</p>
            <p class="card-text"><strong>Số điện thoại:</strong> {{ $order->user_phone }}</p>
            <p class="card-text"><strong>Địa chỉ:</strong> {{ $order->user_address }}</p>
            
            <h5 class="card-title mt-4">Thông tin người nhận hàng</h5>
            <p class="card-text"><strong>Tên:</strong> {{ $order->receiver_name }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $order->receiver_email }}</p>
            <p class="card-text"><strong>Số điện thoại:</strong> {{ $order->receiver_phone }}</p>
            <p class="card-text"><strong>Địa chỉ:</strong> {{ $order->receiver_address }}</p>

            <h5 class="card-title mt-4">Thông tin đơn hàng</h5>
            <p class="card-text"><strong>Trạng thái đơn hàng:</strong> {{ $order::ORDER_STATUS[$order->order_status] }}</p>
            <p class="card-text"><strong>Trạng thái thanh toán:</strong> {{ $order::PAYMENT_STATUS[$order->payment_status] }}</p>
            <p class="card-text"><strong>Tổng tiền:</strong> {{ number_format($order->total_price, 2) }} đ</p>
        </div>
    </div>

    <h2 class="mt-4">Sản phẩm trong đơn hàng</h2>
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
            @foreach($order->orderItems as $item)
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

    <!-- Form cập nhật trạng thái đơn hàng -->
    <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="order_status">Trạng thái đơn hàng:</label>
            <select name="order_status" id="order_status" class="form-control">
                @foreach($order::ORDER_STATUS as $status => $statusName)
                    <option value="{{ $status }}" {{ $order->order_status == $status ? 'selected' : '' }}>{{ $statusName }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="payment_status">Trạng thái thanh toán:</label>
            <select name="payment_status" id="payment_status" class="form-control">
                @foreach($order::PAYMENT_STATUS as $status => $statusName)
                    <option value="{{ $status }}" {{ $order->payment_status == $status ? 'selected' : '' }}>{{ $statusName }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Cập nhật trạng thái</button>
    </form>
</div>
@endsection
