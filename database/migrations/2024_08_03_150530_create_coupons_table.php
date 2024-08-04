<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // Mã giảm giá
            $table->decimal('discount_amount', 8, 2)->nullable(); // Số tiền giảm
            $table->decimal('discount_percent', 5, 2)->nullable(); // Phần trăm giảm giá
            $table->integer('usage_limit')->nullable(); // Giới hạn số lần sử dụng
            $table->integer('used_count')->default(0); // Số lần đã sử dụng
            $table->timestamp('expires_at')->nullable(); // Ngày hết hạn
            $table->timestamps(); // Timestamps cho created_at và updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}

