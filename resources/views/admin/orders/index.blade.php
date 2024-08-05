@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h1>Danh sách Đơn hàng</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên người đặt</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>

                <th>Tổng tiền</th>
                <th>Trạng thái đơn hàng</th>
                <th>Trạng thái thanh toán</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user_name }}</td>
                <td>{{ $order->user_email }}</td>
                <td>{{ $order->user_phone }}</td>
                <td>{{ $order->user_address }}</td>

                <td>{{ number_format($order->total_price) }} VND</td>
                <td>{{ $order::ORDER_STATUS[$order->order_status] }}</td>
                <td>{{ $order::PAYMENT_STATUS[$order->payment_status] }}</td>
                <td>
                    <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-info btn-sm">Xem</a>
                    <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-warning btn-sm">Chỉnh sửa</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Phân trang -->
    {{ $orders->links() }}
</div>
@endsection
