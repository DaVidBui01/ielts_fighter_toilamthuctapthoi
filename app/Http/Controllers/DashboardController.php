<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        // Kiểm tra quyền hạn (Role) để trả về View tương ứng
        if ($user->role->role_name == 'admin') {
            // Dữ liệu cho Admin
            $stats = [
                'total_students' => 1250,
                'new_leads' => 45,
                'active_classes' => 32,
                'revenue_month' => '540,000,000'
            ];
            return view('dashboard.admin', compact('user', 'stats'));

        }  elseif ($user->role->role_name == 'teacher') {
            // Dữ liệu cho Teacher
            $classes = [
                ['name' => 'Fighter A - Cơ sở Cầu Giấy', 'time' => 'Thứ 2, 4, 6 (18:00)', 'students' => 15],
                ['name' => 'Fighter B - Cơ sở Quận 10', 'time' => 'Thứ 3, 5, 7 (19:30)', 'students' => 12],
            ];

            $notifications = [
                ['content' => 'Lớp Fighter A có bài thi Mock Test vào ngày mai.', 'type' => 'warning'],
                ['content' => 'Admin vừa cập nhật tài liệu Writing Task 2 mới.', 'type' => 'info'],
            ];

            return view('dashboard.teacher', compact('user', 'classes', 'notifications'));}
        else {
            // Dữ liệu cho Student
            $progress = 65;
            $mockTest = [
                'Listening' => 6.5,
                'Reading' => 7.0,
                'Writing' => 6.0,
                'Speaking' => 6.5
            ];
            return view('dashboard.student', compact('user', 'progress', 'mockTest'));
        }
    }

    public function studentIndex() {
    /** @var \App\Models\User $user */
        $user = Auth::user();

        // Giả lập dữ liệu (Sau này sẽ lấy từ DB)
        $progress = 65; // Học viên đã hoàn thành 65% khóa học
        $mockTest = ['Listening' => 6.5, 'Reading' => 7.0, 'Writing' => 6.0, 'Speaking' => 6.5];

        return view('dashboard.student', compact('user', 'progress', 'mockTest'));
    }

    public function adminIndex() {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Giả lập dữ liệu quản trị
        $stats = [
            'total_students' => 1250,
            'new_leads' => 45, // Đăng ký mới từ homepage
            'active_classes' => 32,
            'revenue_month' => '540,000,000'
        ];

        return view('dashboard.admin', compact('user', 'stats'));
    }
}
