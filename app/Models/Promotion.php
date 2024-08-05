<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Promotion extends Model
{
    protected $fillable = [
        'code',
        'title',
        'description',
        'discount',
        'discount_type',
        'start_date',
        'end_date',
        'active'
    ];

    protected $dates = ['start_date', 'end_date'];

    // Kiểm tra xem khuyến mại có đang hoạt động hay không
    public function isActive()
    {
        $now = Carbon::now();
        return $this->active && $this->start_date <= $now && $this->end_date >= $now;
    }

    public function getFormattedDiscountAttribute()
{
    if ($this->discount_type === 'percentage') {
        return number_format($this->discount, 2, '.', '');
    }

    return number_format($this->discount, 0, '.', '');
}

}
