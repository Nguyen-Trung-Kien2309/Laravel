<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [  'user_id',
    'promotion_id', ];


      // Quan hệ với CartItem
      public function cartItems()
      {
          return $this->hasMany(CartItem::class);
      }
  
      // Quan hệ với Promotion
      public function promotion()
      {
          return $this->belongsTo(Promotion::class);
      }
  
}
