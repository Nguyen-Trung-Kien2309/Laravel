<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa đơn #{{ $invoice->id }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            color: #555;
        }
        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }
        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }
        .invoice-box table tr td:nth-child(2) {
            text-align: right;
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
        .invoice-box table tr.item td{
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
                                <!-- Logo công ty -->
                                <img src="{{ asset('logo.png') }}" style="width: 100%; max-width: 300px;">
                            </td>
                            
                            <td>
                                Hóa đơn #: {{ $invoice->id }}<br>
                                Ngày tạo: {{ $invoice->created_at->format('d-m-Y H:i') }}<br>
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
                                <!-- Thông tin người đặt hàng -->
                                <strong>Người đặt hàng:</strong><br>
                                {{ $invoice->user_name }}<br>
                                {{ $invoice->user_email }}<br>
                                {{ $invoice->user_address }}<br>
                                {{ $invoice->user_phone }}
                            </td>
                            
                            <td>
                                <!-- Thông tin người nhận hàng -->
                                <strong>Người nhận hàng:</strong><br>
                                {{ $invoice->receiver_name }}<br>
                                {{ $invoice->receiver_email }}<br>
                                {{ $invoice->receiver_address }}<br>
                                {{ $invoice->receiver_phone }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>Phương thức thanh toán</td>
                <td>Trạng thái</td>
            </tr>
            
            <tr class="details">
                <td>Thanh toán khi nhận hàng</td>
                <td>{{ $invoice::PAYMENT_STATUS[$invoice->payment_status] }}</td>
            </tr>
            
            <tr class="heading">
                <td>Sản phẩm</td>
                <td>Giá</td>
            </tr>
            
            @foreach($invoice->orderItems as $item)
            <tr class="item">
                <td>{{ $item->product_name }} ({{ $item->variant_size_name }} - {{ $item->variant_color_name }})</td>
                <td>{{ number_format($item->product_price_sale, 2) }} đ x {{ $item->quantity }}</td>
            </tr>
            @endforeach
            
            <tr class="total">
                <td></td>
                <td>Tổng tiền: {{ number_format($invoice->total_price, 2) }} đ</td>
            </tr>
        </table>
    </div>
</body>
</html>
