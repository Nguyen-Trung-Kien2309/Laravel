<?php

namespace App\Http\Controllers;

use App\Mail\InvoiceMail;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmation;

class OrderController extends Controller
{
    // Lưu đơn hàng
    // Lưu đơn hàng
    // public function store(Request $request)
    // {
    //     try {
    //         // Validate dữ liệu đầu vào
    //         $validatedData = $request->validate([
    //             'receiver_name' => 'required|string',
    //             'receiver_address' => 'required|string',
    //             'receiver_phone' => 'required|string',
    //             'total_price' => 'required|numeric',
    //             'cart_items' => 'required|array',
    //             'cart_items.*.product_id' => 'required|exists:products,id',
    //             'cart_items.*.quantity' => 'required|integer|min:1',
    //             'cart_items.*.price' => 'required|numeric|min:0',
    //         ]);

    //         // Tạo đơn hàng
    //         $order = Order::create([
    //             'user_id' => auth()->id(),
    //             'receiver_name' => $request->receiver_name,
    //             'receiver_address' => $request->receiver_address,
    //             'receiver_phone' => $request->receiver_phone,
    //             'total_price' => $request->total_price,
    //             // Các thuộc tính khác
    //         ]);

    //         // Thêm các sản phẩm vào đơn hàng
    //         foreach ($request->cart_items as $item) {
    //             $order->orderItems()->create([
    //                 'product_id' => $item['product_id'],
    //                 'quantity' => $item['quantity'],
    //                 'price' => $item['price'],
    //             ]);

    //             // Xóa sản phẩm trong giỏ
    //             CartItem::where('cart_id', $request->cartId)
    //                 ->where('product_variant_id', $item['product_variant_id'])
    //                 ->delete();
    //         }

    //         // Gửi email hóa đơn
    //         try {
    //             Mail::to(auth()->user()->email)->send(new InvoiceMail($order));
    //         } catch (\Exception $e) {
    //             Log::error('Gửi email hóa đơn thất bại: ' . $e->getMessage());
    //             return redirect()->route('admin.orders.show', $order->id)
    //                              ->with('error', 'Đơn hàng đã được tạo nhưng không thể gửi email hóa đơn. Vui lòng kiểm tra email của bạn sau.');
    //         }

    //         return redirect()->route('admin.orders.show', $order->id)
    //                         ->with('success', 'Đơn hàng của bạn đã được tạo và email hóa đơn đã được gửi!');
    //     } catch (\Exception $exception) {
    //         // Log lỗi và phản hồi cho người dùng
    //         Log::error('Order creation failed: ' . $exception->getMessage());
    //         return redirect()->back()->with('error', 'Đặt hàng không thành công, vui lòng thử lại.');
    //     }
    // }

    // Các phương thức khác


    // Thêm đơn hàng
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

            // try {
                
            //     // Gửi email xác nhận đơn hàng
            //     Mail::to(auth()->user()->email)->send(new InvoiceMail($order));

            // } catch (\Exception $e) {
            //     // Ghi log nếu có lỗi xảy ra
            //     Log::error('Gửi email xác nhận đơn hàng thất bại: ' . $e->getMessage());

            //     // Có thể thông báo lỗi cho người dùng hoặc thực hiện một hành động khác
            //     return redirect()->route('thankyou')
            //                      ->with('warning', 'Đặt hàng thành công nhưng không thể gửi email xác nhận. Vui lòng thử lại sau.');
            // }

            return redirect()->route('thankyou')->with('success', 'Đặt hàng thành công. Email xác nhận đã được gửi!');
        } catch (\Exception $exception) {
            // Log lỗi và phản hồi cho người dùng
            Log::error('Order creation failed: ' . $exception->getMessage());
            return redirect()->back()->with('error', 'Đặt hàng không thành công, vui lòng thử lại.');
        }
    }

    // Danh sách đơn hàng
    public function index()
    {
        // Lấy danh sách đơn hàng từ database
        $orders = Order::with('orderItems')->latest()->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    // Hiển thị chi tiết đơn hàng
    public function show($id)
    {
        $order = Order::with('orderItems')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }
    

    // Phương thức cập nhật trạng thái đơn hàng
    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->only('order_status', 'payment_status'));

        return redirect()->route('admin.orders.index')->with('success', 'Cập nhật trạng thái thành công');
    }
}
