<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    // Hiển thị danh sách khuyến mại
    public function index()
    {
        $promotions = Promotion::all();
        return view('admin.promotions.index', compact('promotions'));
    }

    // Hiển thị form tạo khuyến mại mới
    public function create()
    {
        return view('admin.promotions.create');
    }
    public function show($id)
{
    $promotion = Promotion::findOrFail($id);
    $promotion->discount = $promotion->discount_type === 'percentage'
        ? number_format($promotion->discount,)
        : number_format($promotion->discount, 0, '.', '');

    return view('admin.promotions.show', compact('promotion'));
}


    // Lưu khuyến mại mới vào cơ sở dữ liệu
  

    // Hiển thị form chỉnh sửa khuyến mại
    public function edit(Promotion $promotion)
    {
        return view('admin.promotions.edit', compact('promotion'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'discount' => 'required|numeric|min:0',
            'discount_type' => 'required|in:percentage,fixed',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'active' => 'boolean',
        ]);
    
        Promotion::create([
            'title' => $request->title,
            'description' => $request->description,
            'discount' => $request->discount,
            'discount_type' => $request->discount_type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'active' => $request->active ? 1 : 0,
        ]);
    
        return redirect()->route('admin.promotions.index')->with('success', 'Promotion created successfully.');
    }
    public function update(Request $request, Promotion $promotion)
    {
        // Xác thực dữ liệu
        $request->validate([
            'title' => 'required|string|max:255',
            'discount' => 'required|numeric',
            'discount_type' => 'required|in:percentage,fixed',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

    // Xử lý giá trị discount dựa vào discount_type
    $discount = $request->input('discount_type') == 'percentage'
    ? round($request->input('discount'))  // Làm tròn nếu là percentage
    : $request->input('discount'); 
    $discount = number_format($request->input('discount'), 2, '.', '');// Giữ nguyên nếu là fixed
    
        // Cập nhật khuyến mại
        $promotion->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'discount' => $request->input('discount'),
            'discount_type' => $request->input('discount_type'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'active' => $request->has('active') ? 1 : 0,
        ]);
    
        return redirect()->route('admin.promotions.index')->with('success', 'Khuyến mại đã được cập nhật.');
    }
    
    // Xóa khuyến mại
    public function destroy(Promotion $promotion)
    {
        $promotion->delete();
        return redirect()->route('admin.promotions.index')->with('success', 'Promotion deleted successfully.');
    }
}
