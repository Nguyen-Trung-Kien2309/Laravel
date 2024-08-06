@component('mail::message')
# Xác nhận đơn hàng

Cảm ơn bạn đã đặt hàng tại {{ config('app.name') }}. Dưới đây là chi tiết đơn hàng của bạn:

## Thông tin đơn hàng
- **Mã đơn hàng:** {{ $order->id ?? 'N/A' }}
- **Tên người nhận:** {{ $order->receiver_name ?? 'N/A' }}
- **Địa chỉ:** {{ $order->receiver_address ?? 'N/A' }}
- **Số điện thoại:** {{ $order->receiver_phone ?? 'N/A' }}
- **Tổng giá:** {{ number_format($order->total_price ?? 0, 0, ',', '.') }} VND

## Sản phẩm đã đặt
@foreach($order->orderItems as $item)
- **Tên sản phẩm:** {{ $item->product->name ?? 'N/A' }}
  - Số lượng: {{ $item->quantity ?? 'N/A' }}
  - Giá: {{ number_format($item->price ?? 0, 0, ',', '.') }} VND
@endforeach

Nếu bạn có bất kỳ câu hỏi nào, vui lòng liên hệ với chúng tôi qua email này.

Cảm ơn bạn đã mua hàng!

@component('mail::button', ['url' => route('admin.orders.show', $order->id)])
Xem đơn hàng
@endcomponent

Trân trọng,<br>
{{ config('app.name') }}
@endcomponent
