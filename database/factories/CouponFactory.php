<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Coupon;
use Carbon\Carbon;

class CouponFactory extends Factory
{
    protected $model = Coupon::class;

    public function definition()
    {
        return [
            'code' => strtoupper(Str::random(8)),
            'discount_amount' => $this->faker->randomFloat(2, 5, 100),
            'discount_percent' => $this->faker->randomFloat(2, 5, 50),
            'usage_limit' => $this->faker->numberBetween(1, 100),
            'used_count' => 0,
            'expires_at' => Carbon::now()->addDays($this->faker->numberBetween(10, 100)),
        ];
    }
}

