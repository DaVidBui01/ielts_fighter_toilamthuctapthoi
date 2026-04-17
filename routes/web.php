<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// 1. Trang Homepage (Quảng bá)
Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('/', function () { return view('homepage'); });

// 2. Nhóm trang Đăng nhập / Đăng ký
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// 3. Trang Dashboard (Cần đăng nhập - Middleware)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
// Dashboard
Route::get('/student/dashboard', [App\Http\Controllers\DashboardController::class, 'studentIndex'])->name('student.dashboard')->middleware('auth');
// Dashboard cho Admin
Route::get('/admin/dashboard', [App\Http\Controllers\DashboardController::class, 'adminIndex'])->name('admin.dashboard')->middleware('auth');
// Route quản lý người dùng (ví dụ)
Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
