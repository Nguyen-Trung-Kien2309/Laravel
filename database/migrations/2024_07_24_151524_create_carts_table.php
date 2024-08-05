<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('promotion_id')->nullable()->after('user_id');
            $table->foreign('promotion_id')->references('id')->on('promotions')->onDelete('set null');
        
            $table->foreignIdFor(User::class)->unique()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    
     public function down()
     {
         Schema::table('carts', function (Blueprint $table) {
             $table->dropForeign(['promotion_id']);
             $table->dropColumn('promotion_id');
         });
     }
 };
