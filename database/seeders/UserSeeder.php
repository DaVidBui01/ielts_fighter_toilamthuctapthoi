<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Xóa dữ liệu cũ để tránh lỗi Duplicate entry
        DB::table('users')->delete();

        // Tạo Admin
        User::create([
            'name' => 'Admin IELTS',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'role_id' => 1,
        ]);

        // Tạo Học viên
        User::create([
            'name' => 'Student Davit',
            'email' => 'student@gmail.com',
            'password' => Hash::make('123456'),
            'role_id' => 3,
        ]);
    }
}
