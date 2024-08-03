<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
</head>
<body>
    <h1>Order Confirmation</h1>
    <p>Dear {{ $order->receiver_name }},</p>
    <p>Thank you for your order. Below are the details:</p>
    <p><strong>Order ID:</strong> {{ $order->id }}</p>
    <p><strong>Total Price:</strong> {{ number_format($order->totalPrice, 0, ',', '.') }} VND</p>
    <h3>Items:</h3>
    <ul>
        @foreach ($order->orderItems as $item)
            <li>{{ $item->product_variant->product->name }} - {{ $item->quantity }} x {{ number_format($item->product_variant->product->price_sale ?: $item->product_variant->product->price, 0, ',', '.') }} VND</li>
        @endforeach
    </ul>
    <p>We will notify you once your order is shipped.</p>
    <p>Best regards,<br>Your Company</p>
</body>
</html>
