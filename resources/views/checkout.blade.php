@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Checkout</h1>

        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf
            <div class="row">
                <!-- User Information -->
                <div class="col-md-6 mb-4">
                    <h4 class="mb-3">Billing Address</h4>
                    <div class="form-group">
                        <label for="user_name">First Name</label>
                        <input class="form-control" id="user_name" name="user_name" type="text" value="{{ old('user_name') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="user_email">E-mail</label>
                        <input class="form-control" id="user_email" name="user_email" type="email" value="{{ old('user_email') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="user_address">Address</label>
                        <input class="form-control" id="user_address" name="user_address" type="text" value="{{ old('user_address') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="user_phone">Phone</label>
                        <input class="form-control" id="user_phone" name="user_phone" type="text" value="{{ old('user_phone') }}" required>
                    </div>
                </div>

                <!-- Shipping Information -->
                <div class="col-md-6 mb-4">
                    <h4 class="mb-3">Shipping Address</h4>
                    <div class="form-group">
                        <label for="receiver_name">First Name</label>
                        <input class="form-control" id="receiver_name" name="receiver_name" type="text" value="{{ old('receiver_name') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="receiver_email">E-mail</label>
                        <input class="form-control" id="receiver_email" name="receiver_email" type="email" value="{{ old('receiver_email') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="receiver_address">Address</label>
                        <input class="form-control" id="receiver_address" name="receiver_address" type="text" value="{{ old('receiver_address') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="receiver_phone">Phone</label>
                        <input class="form-control" id="receiver_phone" name="receiver_phone" type="text" value="{{ old('receiver_phone') }}" required>
                    </div>
                </div>
            </div>
            <!-- Order Summary -->
            <h4 class="mb-3">Order Summary</h4>
            <div class="table-responsive mb-4">
                
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart->cartItems as $item)
                            <tr>
                                <td>{{ $item->productVariant->product->name }}</td>
                                <td>{{ number_format($item->productVariant->product->price_sale ?: $item->productVariant->product->price, 0, ',', '.') }} VND</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ number_format(($item->productVariant->product->price_sale ?: $item->productVariant->product->price) * $item->quantity, 0, ',', '.') }} VND</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3" class="text-right">Subtotal</th>
                            <th>{{ number_format($totalAmount, 0, ',', '.') }} VND</th>
                        </tr>
                        <tr>
                            <th colspan="3" class="text-right">Shipping</th>
                            <th>10 VND</th> <!-- Assuming shipping cost is fixed -->
                        </tr>
                        <tr>
                            <th colspan="3" class="text-right">Total</th>
                            <th>{{ number_format($totalAmount + 10, 0, ',', '.') }} VND</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <!-- Hidden Fields -->
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <input type="hidden" name="total_amount" value="{{ $totalAmount }}">
            <input type="hidden" name="product_variants" value="{{ json_encode($productVariants) }}">
            <input type="hidden" name="cart_id" value="{{ $cartId }}">

            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>
    </div>
@endsection
