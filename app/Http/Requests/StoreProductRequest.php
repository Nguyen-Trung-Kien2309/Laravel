<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Chỉnh sửa theo yêu cầu quyền của bạn
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'price_sale' => 'nullable|numeric|min:0',
            'description' => 'required|string',
            'img_thumb' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_galleries.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
            'is_active' => 'required|boolean',
            
            'sku' => 'required|string|max:255|unique:products,sku',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm là bắt buộc.',
            'price.required' => 'Giá sản phẩm là bắt buộc.',
            'price_sale.numeric' => 'Giá sale phải là số.',
            'description.required' => 'Mô tả sản phẩm là bắt buộc.',
            'img_thumb.image' => 'Ảnh thumb phải là định dạng hình ảnh.',
            'img_thumb.mimes' => 'Ảnh thumb phải có định dạng: jpeg, png, jpg, gif.',
            'product_galleries.*.image' => 'Ảnh thư viện phải là định dạng hình ảnh.',
            'product_galleries.*.mimes' => 'Ảnh thư viện phải có định dạng: jpeg, png, jpg, gif.',
            'category_id.required' => 'Danh mục sản phẩm là bắt buộc.',
            'is_active.required' => 'Trạng thái sản phẩm là bắt buộc.',
            'sku.required' => 'Mã sản phẩm là bắt buộc.',
            'sku.unique' => 'Mã sản phẩm đã tồn tại.',
        ];
    }
}

