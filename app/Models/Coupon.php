<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'discount_amount',
        'discount_percent',
        'usage_limit',
        'used_count',
        'expires_at',
    ];

    protected $dates = ['expires_at']; // Đảm bảo `expires_at` được xử lý như Carbon instance

    // Kiểm tra nếu coupon đã hết hạn
    public function isExpired(): bool
    {
        return $this->expires_at && $this->expires_at->isPast();
    }

    // Kiểm tra nếu coupon đã đạt đến giới hạn sử dụng
    public function isUsageLimitReached(): bool
    {
        return $this->usage_limit && $this->used_count >= $this->usage_limit;
    }
}
