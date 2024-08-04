<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Tên khuyến mại
            $table->text('description')->nullable(); // Mô tả chi tiết
            $table->decimal('discount', 5, 2); // Giảm giá (phần trăm hoặc số tiền cụ thể)
            $table->enum('discount_type', ['percentage', 'fixed'])->default('percentage'); // Loại giảm giá
            $table->date('start_date'); // Ngày bắt đầu
            $table->date('end_date'); // Ngày kết thúc
            $table->boolean('active')->default(true); // Trạng thái hoạt động của khuyến mại
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotions');
    }
}
