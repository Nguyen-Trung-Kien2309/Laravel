<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Coupon;

class CouponSeeder extends Seeder
{
    public function run()
    {
        Coupon::factory()->count(10)->create(); // Tạo 50 mã giảm giá mẫu
    }
}

