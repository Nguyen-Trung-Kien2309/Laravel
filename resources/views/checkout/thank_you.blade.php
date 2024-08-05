<!-- resources/views/checkout/thank_you.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Cảm ơn bạn đã đặt hàng!</h1>
        <p>Đơn hàng của bạn đã được xử lý thành công. Mã đơn hàng của bạn là: {{ $order->id }}</p>
    </div>
@endsection
