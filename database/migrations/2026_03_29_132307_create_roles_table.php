<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('role_name')->unique(); // admin, teacher, student
            $table->timestamps();
        });

        // Chèn luôn dữ liệu mẫu vào bảng roles
        DB::table('roles')->insert([
            ['role_name' => 'admin'],
            ['role_name' => 'teacher'],
            ['role_name' => 'student'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
