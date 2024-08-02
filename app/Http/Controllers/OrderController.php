<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmation;

class OrderController extends Controller
{
    public function add(Request $request)
    {
        try {
            // Validate dữ liệu đầu vào
            $validatedData = $request->validate([
                'userId' => 'required|exists:users,id',
                'user_email' => 'required|email',
                'user_name' => 'required|string',
                'user_address' => 'required|string',
                'user_phone' => 'required|string',
                'receiver_email' => 'required|email',
                'receiver_name' => 'required|string',
                'receiver_address' => 'required|string',
                'receiver_phone' => 'required|string',
                'totalAmount' => 'required|numeric',
                'productVariants' => 'required|json',
                'cartId' => 'required|exists:carts,id'
            ]);

            // Lưu thông tin vào bảng order
            $order = Order::create([
                'user_id' => $request->userId,
                'user_email' => $request->user_email,
                'user_name' => $request->user_name,
                'user_address' => $request->user_address,
                'user_phone' => $request->user_phone,
                'receiver_email' => $request->receiver_email,
                'receiver_name' => $request->receiver_name,
                'receiver_address' => $request->receiver_address,
                'receiver_phone' => $request->receiver_phone,
                'total_price' => $request->totalAmount,
            ]);

            // Tạo order item
            foreach (json_decode($request->productVariants) as $item) {
                $itemArray = (array) $item;
                $itemArray['order_id'] = $order->id;
                OrderItem::create($itemArray);

                // Xóa sản phẩm trong giỏ
                CartItem::where('cart_id', $request->cartId)
                    ->where('product_variant_id', $item->product_variant_id)
                    ->delete();
            }

            // Gửi email xác nhận đơn hàng
            Mail::to($request->receiver_email)->send(new OrderConfirmation($order));

            return redirect()->route('thankyou')->with('success', 'Đặt hàng thành công');
        } catch (\Exception $exception) {
            // Log lỗi và phản hồi cho người dùng
            Log::error('Order creation failed: '.$exception->getMessage());
            return redirect()->back()->with('error', 'Đặt hàng không thành công, vui lòng thử lại.');
        }
    }
}
