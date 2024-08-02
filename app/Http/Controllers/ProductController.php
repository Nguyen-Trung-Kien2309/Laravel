<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    //
    public function detail($slug) {
        $product = Product::query()->where('slug', $slug)
            ->with(['category', 'galleries', 'variants'])->first();
        
        // Khởi tạo biến liên quan
        $product_variants = $product->variants->all();
        $colorIds = [];
        $sizeIds = [];
        foreach ($product_variants as $item) {
            $colorIds[] = $item->product_color_id;
            $sizeIds[] = $item->product_size_id;
        }
        $colors = ProductColor::query()->whereIn('id', $colorIds)->pluck('name', 'id')->all();
        $sizes = ProductSize::query()->whereIn('id', $sizeIds)->pluck('name', 'id')->all();
        
        // Kiểm tra nếu biến có giá trị hợp lệ
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->limit(7)
            ->get();
            $categories = Category::pluck('name', 'id'); // Lấy danh mục và truyền vào view
    
            $variantImages = $product->variants->pluck('image');
        return view('product-detail', compact('product','categories','variantImages', 'colors', 'sizes', 'relatedProducts'));
    }
    // public function getCategories() {
    //     $categories = Category::all();
    //     return view('layouts.sidebar', compact('categories'));
    // }
    
    
    public function list(Request $request)
    {
        // Start building the query
        $query = Product::query();
    
        // Eager load the required relationships
        $query->with(['variants.size', 'variants.color', 'galleries']);
    
        // Check for price filter
        if ($request->has('price_min') && $request->has('price_max')) {
            $query->whereBetween('price_sale', [$request->price_min, $request->price_max]);
        }
    
        // Check for color filter
        if ($request->has('colors')) {
            $query->whereHas('variants.color', function ($q) use ($request) {
                $q->whereIn('id', $request->colors);
            });
        }
    
        // Check for size filter
        if ($request->has('sizes')) {
            $query->whereHas('variants.size', function ($q) use ($request) {
                $q->whereIn('id', $request->sizes);
            });
        }
    
        // Fetch the filtered products
        $products = $query->paginate(9);
       
    
        // Fetch categories, sizes, and colors for filtering options
        $categories = Category::pluck('name', 'id');
        $sizes = ProductSize::pluck('name', 'id');
        $colors = ProductColor::pluck('name', 'id');
    
        // Return view with data
        return view('product-list', compact('products', 'categories', 'sizes', 'colors'));
    }
    
}
