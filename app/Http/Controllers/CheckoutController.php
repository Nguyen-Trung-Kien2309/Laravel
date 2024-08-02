<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Cart::where('user_id', Auth::id())->first();
        $totalPrice = $cart->cartItems->sum(function($item) {
            return ($item->productVariant->product->price_sale ?: $item->productVariant->product->price) * $item->quantity;
        });
        return view('checkout', compact('cart', 'totalPrice'));
    }

   public function process(Request $request)
    {
        // Validate input
        $request->validate([
            'billing_first_name' => 'required|string|max:255',
            'billing_last_name' => 'required|string|max:255',
            'billing_email' => 'required|email|max:255',
            'billing_mobile_no' => 'required|string|max:20',
            'billing_address1' => 'required|string|max:255',
            'billing_city' => 'required|string|max:255',
            'billing_state' => 'required|string|max:255',
            'billing_zip' => 'required|string|max:20',
            'payment_method' => 'required|string',
        ]);
    
        // Create order
        $order = new Order();
        $order->user_id = Auth::id();
        $order->billing_first_name = $request->billing_first_name;
        $order->billing_last_name = $request->billing_last_name;
        $order->billing_email = $request->billing_email;
        $order->billing_mobile_no = $request->billing_mobile_no;
        $order->billing_address1 = $request->billing_address1;
        $order->billing_address2 = $request->billing_address2;
        $order->billing_country = $request->billing_country;
        $order->billing_city = $request->billing_city;
        $order->billing_state = $request->billing_state;
        $order->billing_zip = $request->billing_zip;
        $order->payment_method = $request->payment_method;
    
        // Save order
        $order->save();
    
        // Clear cart
        Cart::where('user_id', Auth::id())->delete();
    
        // Redirect to thank you page
        return redirect()->route('thankyou');
    }
    
}
