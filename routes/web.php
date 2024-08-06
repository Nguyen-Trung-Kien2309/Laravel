<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Trang chủ hiển thị danh sách sản phẩm


Route::get('/', function () {
    $products = Product::query()
        ->latest('id')
        ->with('category') // Eager load category relationship
        ->limit(30)
        ->get();

    $categories = Category::pluck('name', 'id'); // Lấy danh mục và truyền vào view
    $banners = Banner::where('active', true)->get();
    return view('welcome', compact('products', 'categories','banners'));
})->name('welcome');

// Chi tiết sản phẩm
Route::get('product/{slug}', [ProductController::class, 'detail'])->name('product.detail');
Route::get('/products', [ProductController::class, 'list'])->name('product.list');
Route::get('/products/sort', [ProductController::class, 'sort'])->name('product.sort');
Route::get('/products/search', [ProductController::class, 'search'])->name('product.search');
Route::get('/products/{id}', [ProductController::class, 'details'])->name('product.details');
// Mua hàng (cần xác thực)
Route::middleware('auth')->group(function () {
    Route::post('cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('cart.remove');

    Route::get('cart/list', [CartController::class, 'list'])->name('cart.list');
    Route::post('order/add', [OrderController::class, 'add'])->name('order.add');
    Route::get('order/list', [OrderController::class, 'list'])->name('order.list');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('admin.orders.show');

    // Định nghĩa route cho trang thanh toán
  //  Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
  // web.php

Route::post('/cart/apply-promotion', [CartController::class, 'applyPromotion'])->name('cart.apply_promotion');


Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
Route::get('checkout/cancel', [CheckoutController::class, 'cancel'])->name('checkout.cancel');




Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/thankyou', function () {
        return view('thankyou');
    })->name('thankyou');

});



// Route::middleware('auth')->group(function () {
//     Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
//     Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
//     Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('cart.remove');
// });


// Đăng nhập, đăng ký và các route liên quan
Auth::routes();

// Trang chính sau khi đăng nhập
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
