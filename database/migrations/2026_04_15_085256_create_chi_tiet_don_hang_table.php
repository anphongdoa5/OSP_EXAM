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
        if (!Schema::hasTable('chi_tiet_don_hang')) {
            Schema::create('chi_tiet_don_hang', function (Blueprint $table) {
                $table->unsignedInteger('ma_don_hang');
                $table->unsignedInteger('id_san_pham');
                $table->integer('so_luong');
                $table->integer('don_gia');
                
                $table->primary(['ma_don_hang', 'id_san_pham']);
                $table->foreign('ma_don_hang')->references('ma_don_hang')->on('don_hang')->onDelete('cascade');
                $table->foreign('id_san_pham')->references('id')->on('san_pham')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_don_hang');
    }
};
