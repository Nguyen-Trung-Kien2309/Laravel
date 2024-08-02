<?php

use App\Http\Controllers\ProductController;
use App\Models\Product;
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

Route::get('/', function () {
    $products = Product::query()->latest('id')->with('category')->limit(30)->get();
    return view('welcome',compact('products'));
})->name('welcome');


// Chi tiết sản phẩm
Route::get('product/{slug}' ,[ProductController::class, 'detail'])->name('product.detail');
Route::get('/products', [ProductController::class, 'list'])->name('product.list');
Route::get('/products/sort', [ProductController::class, 'sort'])->name('product.sort');
Route::get('/products/search', [ProductController::class, 'search'])->name('product.search');
Route::get('/products/{id}', [ProductController::class, 'details'])->name('product.details');
//Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');


// mua hàng
Route::post('cart/add', [\App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
Route::get('cart/list', [\App\Http\Controllers\CartController::class, 'list'])->name('cart.list');
Route::post('order/add', [\App\Http\Controllers\OrderController::class, 'add'])->name('order.add');
Route::get('order/list', [\App\Http\Controllers\OrderController::class, 'list'])->name('order.list');
