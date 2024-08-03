<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

use App\Mail\OrderConfirmation;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = CartItem::where('cart_id', Auth::user()->cart_id)->get();
        
        $totalAmount = $cart->sum(function ($item) {
            return $item->quantity * $item->product_variant->price;
        });

        return view('checkout', [
            'totalAmount' => $totalAmount,
            'productVariants' => $cart->map(function ($item) {
                return [
                    'product_variant_id' => $item->product_variant_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product_variant->price,
                ];
            }),
            'cartId' => Auth::user()->cart_id,
        ]);
    }

    public function process(Request $request)
    {
        try {
            $order = Order::create([
                'user_id' => $request->user_id,
                'user_email' => $request->user_email,
                'user_name' => $request->user_name,
                'user_address' => $request->user_address,
                'user_phone' => $request->user_phone,
                'receiver_email' => $request->receiver_email,
                'receiver_name' => $request->receiver_name,
                'receiver_address' => $request->receiver_address,
                'receiver_phone' => $request->receiver_phone,
                'total_price' => $request->total_amount,
            ]);

            $productVariants = json_decode($request->product_variants);
            foreach ($productVariants as $item) {
                $item->order_id = $order->id;
                OrderItem::create((array) $item);

                CartItem::where([
                    'cart_id' => $request->cart_id,
                    'product_variant_id' => $item->product_variant_id
                ])->delete();
            }

            // Gửi email xác nhận đơn hàng
            Mail::to($request->user_email)->send(new OrderConfirmation($order));

            return redirect()->route('thankyou')->with('success', 'Đặt hàng thành công');
        } catch (\Exception $exception) {
            Log::error('Order creation failed: '.$exception->getMessage());
            return back()->withErrors(['error' => 'Đặt hàng không thành công.']);
        }
    }
    
}