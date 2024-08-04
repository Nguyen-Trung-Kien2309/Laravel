<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller
{
    // Hiển thị danh sách mã giảm giá
    public function index()
    {
        $coupons = Coupon::all();
        return view('coupons.index', compact('coupons'));
    }

    // Hiển thị form tạo mã giảm giá mới
    public function create()
    {
        return view('coupons.create');
    }

    // Lưu mã giảm giá mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|unique:coupons',
            'discount_amount' => 'nullable|numeric',
            'discount_percent' => 'nullable|numeric|min:0|max:100',
            'usage_limit' => 'nullable|integer|min:0',
            'expires_at' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Coupon::create($request->all());

        return redirect()->route('coupons.index')->with('success', 'Mã giảm giá đã được tạo thành công.');
    }

    // Hiển thị form chỉnh sửa mã giảm giá
    public function edit(Coupon $coupon)
    {
        return view('coupons.edit', compact('coupon'));
    }

    // Cập nhật mã giảm giá
    public function update(Request $request, Coupon $coupon)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|unique:coupons,code,' . $coupon->id,
            'discount_amount' => 'nullable|numeric',
            'discount_percent' => 'nullable|numeric|min:0|max:100',
            'usage_limit' => 'nullable|integer|min:0',
            'expires_at' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $coupon->update($request->all());

        return redirect()->route('coupons.index')->with('success', 'Mã giảm giá đã được cập nhật thành công.');
    }

    // Xóa mã giảm giá
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();

        return redirect()->route('coupons.index')->with('success', 'Mã giảm giá đã được xóa thành công.');
    }
}
