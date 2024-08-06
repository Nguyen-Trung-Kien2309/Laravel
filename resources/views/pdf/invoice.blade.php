<!-- resources/views/pdf/invoice.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Hóa Đơn Mua Hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            border-radius: 10px;
        }
        .invoice-box table {
            width: 100%;
            line-height: 24px;
            text-align: left;
        }
        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }
        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }
        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }
        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }
        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }
        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }
        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }
        .invoice-box table tr.item.last td {
            border-bottom: none;
        }
        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <table>
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="{{ public_path('logo.png') }}" style="width: 100%; max-width: 300px;">
                            </td>
                            <td>
                                Ngày: {{ \Carbon\Carbon::now()->format('d/m/Y') }}<br>
                                Mã Đơn Hàng: {{ $order->id }}<br>
                                Trạng Thái: {{ $order->status }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                {{ $order->user_name }}<br>
                                {{ $order->user_address }}<br>
                                {{ $order->user_phone }}
                            </td>
                            <td>
                                {{ $order->receiver_name }}<br>
                                {{ $order->receiver_address }}<br>
                                {{ $order->receiver_phone }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td>Sản phẩm</td>
                <td>Giá</td>
            </tr>
            @foreach ($order->orderItems as $item)
                <tr class="item">
                    <td>{{ $item->product->name }} x {{ $item->quantity }}</td>
                    <td>{{ number_format($item->price, 2) }} VNĐ</td>
                </tr>
            @endforeach
            <tr class="total">
                <td></td>
                <td>Tổng tiền: {{ number_format($order->total_price, 2) }} VNĐ</td>
            </tr>
        </table>
    </div>
</body>
</html>
