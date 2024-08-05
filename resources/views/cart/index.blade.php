@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Giỏ Hàng Của Bạn</h1>

        @if(session('message'))
            <div class="alert alert-info">
                {{ session('message') }}
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
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart->cartItems as $item)
                        <tr>
                            <td><img src="{{ Storage::url($item->productVariant->product->img_thumb )}}" alt="{{ $item->productVariant->product->name }}" width="100"></td>
                            <td>{{ $item->productVariant->product->name }}</td>
                            <td>{{ $item->productVariant->size->name }}</td>
                            <td>{{ $item->productVariant->color->name }}</td>
                            <td>{{ number_format($item->productVariant->product->price_sale ?: $item->productVariant->product->price, 0, ',', '.') }} VND</td>
                            <td>
                                <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="input-group quantity mr-3" style="width: 130px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary btn-minus" type="submit">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="number" class="form-control bg-secondary text-center" name="quantity" id="quantity" min="1" value="{{ $item->quantity }}" required>
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary btn-plus" type="submit">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    {{-- <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" required>
                                    <button type="submit" class="btn btn-primary">Cập nhật</button> --}}
                                </form>
                            </td>
                            <td>{{ number_format(($item->productVariant->product->price_sale ?: $item->productVariant->product->price) * $item->quantity, 0, ',', '.') }} VND</td>
                            <td>
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h3>Tổng tiền: {{ number_format($totalPrice, 0, ',', '.') }} VND</h3>

            <a href="{{ route('checkout') }}" class="btn btn-success">Thanh toán</a>
        @else
            <p>Giỏ hàng của bạn đang trống.</p>
        @endif
    </div>
@endsection
