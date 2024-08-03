<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\UserController;
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

    // Quản lý sản phẩm
    Route::resource('products', ProductController::class);
    Route::resource('users', UserController::class);
    Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::resource('banners', BannerController::class);
    Route::get('banners/{banner}', [BannerController::class, 'show'])->name('banners.show');
    Route::resource('promotions', PromotionController::class);
    Route::get('promotions/{promotion}', [PromotionController::class, 'show'])->name('promotions.show');




    // Bạn có thể thêm nhiều route khác cho phần admin tại đây
});
