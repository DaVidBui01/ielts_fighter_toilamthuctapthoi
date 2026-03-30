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
            return view('dashboard.admin');
        } elseif ($user->role->role_name == 'teacher') {
            return view('dashboard.teacher');
        } else {
            return view('dashboard.student');
        }
    }
}
