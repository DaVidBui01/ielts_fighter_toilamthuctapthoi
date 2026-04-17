<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard - IELTS Fighter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root { --teacher-primary: #2c3e50; --teacher-accent: #27ae60; }
        body { background-color: #f8f9fa; }
        .sidebar { min-height: 100vh; background: var(--teacher-primary); color: white; }
        .sidebar .nav-link { color: rgba(255,255,255,0.7); padding: 12px 20px; }
        .sidebar .nav-link.active { color: white; background: rgba(255,255,255,0.1); border-left: 4px solid var(--teacher-accent); }
        .card-custom { border: none; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block sidebar px-0 shadow">
            <div class="p-4 text-center">
                <h4 class="fw-bold text-white mb-0">IELTS <span class="text-success">TEACHER</span></h4>
                <p class="small text-muted mt-1">Xin chào, {{ $user->name }}</p>
            </div>
            <div class="nav flex-column mt-2">
                <a href="#" class="nav-link active"><i class="bi bi-grid-1x2-fill me-2"></i> Tổng quan</a>
                <a href="#" class="nav-link"><i class="bi bi-journal-check me-2"></i> Quản lý Lớp học</a>
                <a href="#" class="nav-link"><i class="bi bi-clipboard-data me-2"></i> Nhập điểm số</a>
                <a href="#" class="nav-link"><i class="bi bi-folder2-open me-2"></i> Kho tài liệu</a>
                <hr class="text-secondary mx-3">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link border-0 bg-transparent w-100 text-start text-danger">
                        <i class="bi bi-box-arrow-right me-2"></i> Đăng xuất
                    </button>
                </form>
            </div>
        </nav>

        <main class="col-md-10 ms-sm-auto px-md-4 py-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold text-dark">Lịch trình giảng dạy</h2>
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle rounded-pill" type="button" data-bs-toggle="dropdown">
                        Học kỳ 1 - 2026
                    </button>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-8">
                    <div class="card card-custom p-4 h-100">
                        <h5 class="fw-bold mb-4">Danh sách lớp đang dạy</h5>
                        <div class="row g-3">
                            @foreach($classes as $class)
                            <div class="col-12">
                                <div class="p-3 border rounded-3 d-flex justify-content-between align-items-center bg-white">
                                    <div>
                                        <h6 class="fw-bold mb-1 text-primary">{{ $class['name'] }}</h6>
                                        <p class="mb-0 small text-muted"><i class="bi bi-clock me-1"></i> {{ $class['time'] }}</p>
                                    </div>
                                    <div class="text-end">
                                        <span class="badge bg-light text-dark border mb-1">{{ $class['students'] }} học viên</span><br>
                                        <a href="#" class="btn btn-sm btn-success">Vào lớp</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-custom p-4 h-100 shadow-sm border-top border-success border-4">
                        <h5 class="fw-bold mb-3">Thông báo mới</h5>
                        @foreach($notifications as $noti)
                        <div class="alert alert-{{ $noti['type'] }} py-2 px-3 small border-0 mb-2">
                            <i class="bi bi-info-circle me-1"></i> {{ $noti['content'] }}
                        </div>
                        @endforeach
                        <div class="mt-4">
                            <h6 class="fw-bold small">Tiện ích nhanh:</h6>
                            <button class="btn btn-sm btn-outline-primary w-100 mb-2 mt-2 text-start"><i class="bi bi-plus-circle me-2"></i>Tạo bài tập về nhà</button>
                            <button class="btn btn-sm btn-outline-primary w-100 text-start"><i class="bi bi-megaphone me-2"></i>Gửi thông báo cho lớp</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
