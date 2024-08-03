<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PromotionController extends Controller
{
    public function index()
    {
        // Lấy tất cả promotions từ cơ sở dữ liệu
        $promotions = Promotion::all();
        
        // Trả về view index cùng với dữ liệu promotions
        return view('admin.promotions.index', compact('promotions'));
    }

    public function create()
    {
        // Trả về view để tạo promotion mới
        return view('admin.promotions.create');
    }

    public function store(Request $request)
    {
        // Xác thực dữ liệu từ form
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'discount_percentage' => 'required|numeric|min:0|max:100',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Tạo promotion mới từ dữ liệu đã xác thực
        Promotion::create($request->only('name', 'description', 'discount_percentage', 'start_date', 'end_date'));

        // Điều hướng về trang danh sách promotions sau khi tạo thành công
        return redirect()->route('admin.promotions.index')->with('success', 'Promotion created successfully.');
    }

    public function edit(Promotion $promotion)
    {
        // Trả về view để chỉnh sửa promotion
        return view('admin.promotions.edit', compact('promotion'));
    }

    public function update(Request $request, Promotion $promotion)
    {
        // Xác thực dữ liệu từ form
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'discount_percentage' => 'required|numeric|min:0|max:100',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Cập nhật promotion với dữ liệu đã xác thực
        $promotion->update($request->only('name', 'description', 'discount_percentage', 'start_date', 'end_date'));

        // Điều hướng về trang danh sách promotions sau khi cập nhật thành công
        return redirect()->route('admin.promotions.index')->with('success', 'Promotion updated successfully.');
    }

    public function show(Promotion $promotion)
    {
        // Chuyển đổi trường ngày tháng thành đối tượng Carbon nếu cần
        $promotion->start_date = Carbon::parse($promotion->start_date);
        $promotion->end_date = Carbon::parse($promotion->end_date);
    
        // Trả về view để hiển thị chi tiết promotion
        return view('admin.promotions.show', compact('promotion'));
    }

    public function destroy(Promotion $promotion)
    {
        // Xóa promotion khỏi cơ sở dữ liệu
        $promotion->delete();
        
        // Điều hướng về trang danh sách promotions sau khi xóa thành công
        return redirect()->route('admin.promotions.index')->with('success', 'Promotion deleted successfully.');
    }
}
