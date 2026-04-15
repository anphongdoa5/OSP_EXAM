<?php

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
        if (!Schema::hasTable('don_hang')) {
            Schema::create('don_hang', function (Blueprint $table) {
                $table->increments('ma_don_hang');
                $table->dateTime('ngay_dat_hang');
                $table->smallInteger('tinh_trang');
                $table->smallInteger('hinh_thuc_thanh_toan');
                $table->unsignedInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('don_hang');
    }
};
