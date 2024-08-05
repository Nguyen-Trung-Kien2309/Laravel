<!-- resources/views/checkout/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Thanh Toán</h1>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if(isset($cart) && !$cart->cartItems->isEmpty())
            <table class="table">
                <thead>
                    <tr>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Kích cỡ</th>
                        <th>Màu sắc</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng giá</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart->cartItems as $item)
                        <tr>
                            <td><img src="{{ Storage::url($item->productVariant->product->img_thumb) }}" alt="{{ $item->productVariant->product->name }}" width="100"></td>
                            <td>{{ $item->productVariant->product->name }}</td>
                            <td>{{ $item->productVariant->size->name }}</td>
                            <td>{{ $item->productVariant->color->name }}</td>
                            <td>{{ number_format($item->productVariant->product->price_sale ?: $item->productVariant->product->price, 0, ',', '.') }} VND</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format(($item->productVariant->product->price_sale ?: $item->productVariant->product->price) * $item->quantity, 0, ',', '.') }} VND</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h3>Tổng tiền: {{ number_format($totalPrice, 0, ',', '.') }} VND</h3>
            @if ($cart->promotion)
                <h4>Khuyến mại: {{ $cart->promotion->title }} - {{ $cart->promotion->formatted_discount }} {{ $cart->promotion->discount_type === 'percentage' ? '%' : 'VND' }}</h4>
                <h3>Tổng tiền sau khuyến mại: {{ number_format($totalPriceAfterDiscount, 0, ',', '.') }} VND</h3>
            @endif
<!-- resources/views/checkout/index.blade.php -->

<form action="{{ route('checkout.process') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="user_address">Địa chỉ của bạn:</label>
        <input type="text" id="user_address" name="user_address" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="user_phone">Số điện thoại của bạn:</label>
        <input type="text" id="user_phone" name="user_phone" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="receiver_email">Email người nhận:</label>
        <input type="email" id="receiver_email" name="receiver_email" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="receiver_name">Tên người nhận:</label>
        <input type="text" id="receiver_name" name="receiver_name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="receiver_address">Địa chỉ người nhận:</label>
        <input type="text" id="receiver_address" name="receiver_address" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="receiver_phone">Số điện thoại người nhận:</label>
        <input type="text" id="receiver_phone" name="receiver_phone" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Xác nhận thanh toán</button>
</form>

        @else
            <p>Giỏ hàng của bạn đang trống.</p>
        @endif
    </div>
@endsection
