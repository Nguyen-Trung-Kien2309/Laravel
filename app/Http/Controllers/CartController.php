<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\ProductVariant;
use App\Models\Promotion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
   
    public function applyPromotion(Request $request)
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->first();
    
        if (!$cart) {
            return back()->withErrors(['error' => 'Giỏ hàng không tồn tại.']);
        }
    
        $promotionCode = $request->input('promotion_code');
        $promotion = Promotion::where('code', $promotionCode)->first();
    
        if (!$promotion) {
            return back()->withErrors(['error' => 'Mã khuyến mại không hợp lệ.']);
        }
    
        // Kiểm tra xem khuyến mại có còn hiệu lực không
        if (!$promotion->isActive()) {
            return back()->withErrors(['error' => 'Mã khuyến mại đã hết hạn.']);
        }
    
        // Áp dụng khuyến mại cho giỏ hàng
        $cart->promotion_id = $promotion->id;
        $cart->save();
    
        return redirect()->route('cart.index')->with('message', 'Mã khuyến mại đã được áp dụng.');
    }
    

    public function list()
    {
        // Tạm thời lấy mặc định user đầu tiên
        $user = User::query()->first();

        // Kiểm tra nếu không có user nào
        if (!$user) {
            return redirect()->route('login')->with('error', 'User not found. Please login.');
        }

        // Lấy thông tin giỏ hàng của người dùng
        $cart = Cart::query()->where('user_id', $user->id)->first();

        $userId = $user->id;
        $totalAmount = 0;

        // Kiểm tra nếu giỏ hàng không tồn tại
        if (!$cart) {
            $cart = Cart::create(['user_id' => $user->id]);
        }

        // Lấy thông tin sản phẩm trong giỏ hàng
        $productVariants = $cart->cartItems()
            ->join('product_variants', 'product_variants.id', '=', 'cart_items.product_variant_id')
            ->join('products', 'products.id', '=', 'product_variants.product_id')
            ->join('product_sizes', 'product_sizes.id', '=', 'product_variants.product_size_id')
            ->join('product_colors', 'product_colors.id', '=', 'product_variants.product_color_id')
            ->get([
                'cart_items.product_variant_id as product_variant_id',
                'products.name as product_name',
                'products.sku as product_sku',
                'products.img_thumb as product_img_thumb',
                'products.price as product_price',
                'products.price_sale as product_price_sale',
                'product_sizes.name as variant_size_name',
                'product_colors.name as variant_color_name',
                'cart_items.quantity as quantity'
            ]);

        foreach ($productVariants as $item) {
            $totalAmount += $item->quantity * ($item->product_price_sale ?: $item->product_price);
        }

        return view('cart', compact('totalAmount', 'productVariants', 'userId'));
    }

    public function index()
    {
        $user = Auth::user();
    
        if (!$user) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để xem giỏ hàng của bạn.');
        }
    
        $cart = Cart::with('cartItems.productVariant.product', 'cartItems.productVariant.size', 'cartItems.productVariant.color')
                    ->where('user_id', $user->id)
                    ->first();
    
        if (!$cart || $cart->cartItems->isEmpty()) {
            return view('cart.index')->with('message', 'Giỏ hàng của bạn đang trống.');
        }
    
        $totalPrice = $cart->cartItems->sum(function ($cartItem) {
            return ($cartItem->productVariant->product->price_sale ?: $cartItem->productVariant->product->price) * $cartItem->quantity;
        });
    
        // Áp dụng khuyến mại nếu có
        $discount = 0;
        if ($cart->promotion) {
            $discount = $cart->promotion->discount_type === 'percentage'
                ? ($totalPrice * $cart->promotion->discount / 100)
                : $cart->promotion->discount;
        }
    
        $totalPriceAfterDiscount = $totalPrice - $discount;
    
        return view('cart.index', compact('cart', 'totalPrice', 'totalPriceAfterDiscount'));
    }
    

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cartItem = CartItem::findOrFail($id);
        $cartItem->update(['quantity' => $validatedData['quantity']]);

        return redirect()->route('cart.index')->with('success', 'Cập nhật số lượng sản phẩm thành công.');
    }

    public function remove($id)
    {
        $cartItem = CartItem::findOrFail($id);
        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng.');
    }

    public function add(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng.');
        }

        $cart = Cart::where('user_id', $user->id)->first();
        if (!$cart) {
            $cart = Cart::create(['user_id' => $user->id]);
        }

        $productVariant = ProductVariant::where([
            'product_id' => $request->product_id,
            'product_size_id' => $request->product_size_id,
            'product_color_id' => $request->product_color_id
        ])->first();

        if (!$productVariant) {
            return redirect()->back()->with('error', 'Biến thể sản phẩm không tồn tại.');
        }

        $cartItem = CartItem::where('product_variant_id', $productVariant->id)
            ->where('cart_id', $cart->id)
            ->first();

        if ($cartItem) {
            $cartItem->update(['quantity' => $cartItem->quantity + $request->quantity]);
        } else {
            CartItem::create([
                'product_variant_id' => $productVariant->id,
                'cart_id' => $cart->id,
                'quantity' => $request->quantity
            ]);
        }

        return redirect()->route('cart.index');
    }
}