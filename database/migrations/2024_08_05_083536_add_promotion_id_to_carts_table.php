<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPromotionIdToCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->unsignedBigInteger('promotion_id')->nullable()->after('user_id');

            // Nếu bạn có bảng promotions và muốn thêm ràng buộc khóa ngoại
            // $table->foreign('promotion_id')->references('id')->on('promotions')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->dropColumn('promotion_id');

            // Nếu bạn đã thêm ràng buộc khóa ngoại
            // $table->dropForeign(['promotion_id']);
        });
    }
}
