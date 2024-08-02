@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Checkout</h1>

        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf
            <!-- User Information -->
            <h4>Billing Address</h4>
            <div class="form-group">
                <label>First Name</label>
                <input class="form-control" name="user_name" type="text" value="{{ old('user_name') }}" required>
            </div>
            <div class="form-group">
                <label>E-mail</label>
                <input class="form-control" name="user_email" type="email" value="{{ old('user_email') }}" required>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input class="form-control" name="user_address" type="text" value="{{ old('user_address') }}" required>
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input class="form-control" name="user_phone" type="text" value="{{ old('user_phone') }}" required>
            </div>

            <!-- Shipping Information -->
            <h4>Shipping Address</h4>
            <div class="form-group">
                <label>First Name</label>
                <input class="form-control" name="receiver_name" type="text" value="{{ old('receiver_name') }}" required>
            </div>
            <div class="form-group">
                <label>E-mail</label>
                <input class="form-control" name="receiver_email" type="email" value="{{ old('receiver_email') }}" required>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input class="form-control" name="receiver_address" type="text" value="{{ old('receiver_address') }}" required>
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input class="form-control" name="receiver_phone" type="text" value="{{ old('receiver_phone') }}" required>
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
