<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    protected $fillable = [
        'product_size_id', 'product_color_id', 'image', 'quantity', 'price', 'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function size()
    {
        return $this->belongsTo(ProductSize::class, 'product_size_id');
    }

    public function color()
    {
        return $this->belongsTo(ProductColor::class, 'product_color_id');
    }
    public function cartItems()
{
    return $this->hasMany(CartItem::class, 'product_variant_id');
}
}
