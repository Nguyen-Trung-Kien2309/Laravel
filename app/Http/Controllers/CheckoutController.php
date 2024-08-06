<?php
// app/Http/Controllers/CheckoutController.php

namespace App\Http\Controllers;

use App\Mail\InvoiceMail;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function index()
    {
        // Xử lý hiển thị trang thanh toán
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->first();
        
        if (!$cart || $cart->cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        // Tính toán tổng tiền và áp dụng khuyến mại
        $totalPrice = $cart->cartItems->sum(function ($cartItem) {
            return ($cartItem->productVariant->product->price_sale ?: $cartItem->productVariant->product->price) * $cartItem->quantity;
        });

        $discount = 0;
        if ($cart->promotion) {
            $discount = $cart->promotion->discount_type === 'percentage'
                ? ($totalPrice * $cart->promotion->discount / 100)
                : $cart->promotion->discount;
        }

        $totalPriceAfterDiscount = $totalPrice - $discount;

        return view('checkout.index', compact('totalPrice', 'totalPriceAfterDiscount', 'cart'));
    }

 // app/Http/Controllers/CheckoutController.php

public function process(Request $request)
{
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
    }

    $cart = Cart::where('user_id', $user->id)->first();

    if (!$cart || $cart->cartItems->isEmpty()) {
        return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn đang trống.');
    }

    $totalPrice = $cart->cartItems->sum(function ($cartItem) {
        return ($cartItem->productVariant->product->price_sale ?: $cartItem->productVariant->product->price) * $cartItem->quantity;
    });

    $discount = 0;
    if ($cart->promotion) {
        $discount = $cart->promotion->discount_type === 'percentage'
            ? ($totalPrice * $cart->promotion->discount / 100)
            : $cart->promotion->discount;
    }

    $totalPriceAfterDiscount = $totalPrice - $discount;

    // Tạo đơn hàng mới với tất cả các trường bắt buộc
    $order = Order::create([
        'user_id' => $user->id,
        'user_email' => $user->email,
        'user_name' => $user->name,
        'user_address' => $request->input('user_address'), // Đảm bảo có giá trị
        'user_phone' => $request->input('user_phone'), // Đảm bảo có giá trị
        'receiver_email' => $request->input('receiver_email'),
        'receiver_name' => $request->input('receiver_name'),
        'receiver_address' => $request->input('receiver_address'),
        'receiver_phone' => $request->input('receiver_phone'),
        'total_price' => $totalPriceAfterDiscount,
        'promotion_id' => $cart->promotion_id,
        'status' => 'pending',
    ]);

    // Xóa giỏ hàng sau khi thanh toán thành công
    $cart->cartItems()->delete();
    $cart->delete();
 // Gửi email hóa đơn
 Mail::to($user->email)->send(new InvoiceMail($order));
    return view('checkout.thank_you', compact('order'));
}

}