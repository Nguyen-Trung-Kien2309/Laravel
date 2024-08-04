<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrderController;
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

// Đảm bảo rằng các route admin chỉ có thể truy cập bởi admin bằng middleware 'auth' và 'checkRole'
Route::prefix('admin')->as('admin.')->middleware(['auth', 'checkRole:admin'])->group(function () {
    // Dashboard cho Admin
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Quản lý danh mục sản phẩm
    Route::resource('categories', CategoryController::class);
    Route::resource('promotions', PromotionController::class);
// Route cho form tạo mới khuyến mại
Route::get('admin/promotions/create', [PromotionController::class, 'create'])->name('promotions.create');
Route::get('admin/promotions/{promotion}', [PromotionController::class, 'show'])->name('admin.promotions.show');


// Route::get('admin/promotions/edit', [PromotionController::class, 'edit'])->name
// ('promotions.edit');
// Route cho form tạo mới khuyến mại
// Route::get('admin/promotions/edit/', [PromotionController::class, 'edit
// '])->name('promotions.edit');


Route::resource('orders', OrderController::class)->except(['create', 'store', 'destroy']);
Route::put('orders/{order}/update-status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');



Route::resource('invoices', InvoiceController::class)->only(['index', 'show']);
Route::get('invoices/{invoice}/print', [InvoiceController::class, 'print'])->name('invoices.print');

    // Quản lý sản phẩm
    Route::resource('products', ProductController::class);
    Route::resource('users', UserController::class);
    Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::resource('banners', BannerController::class);
    Route::get('banners/{banner}', [BannerController::class, 'show'])->name('banners.show');




    // Bạn có thể thêm nhiều route khác cho phần admin tại đây
});
