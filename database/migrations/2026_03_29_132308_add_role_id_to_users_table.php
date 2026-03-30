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
        Schema::table('users', function (Blueprint $table) {
            // Tạo cột role_id sau cột id
            $table->unsignedBigInteger('role_id')->after('id')->default(3); // Mặc định là student

            // Tạo khóa ngoại liên kết sang bảng roles
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');

            // Thêm các cột cần thiết cho IELTS Fighter (tùy chọn)
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
