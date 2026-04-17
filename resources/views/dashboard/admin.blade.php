<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - IELTS Fighter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root { --fighter-red: #e63946; --admin-dark: #2d3436; }
        body { background-color: #f0f2f5; }
        .sidebar { min-height: 100vh; background: var(--admin-dark); color: white; }
        .sidebar .nav-link { color: rgba(255,255,255,0.7); padding: 12px 20px; transition: 0.3s; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { color: white; background: rgba(255,255,255,0.1); border-left: 4px solid var(--fighter-red); }
        .card-stats { border: none; border-radius: 12px; transition: 0.3s; }
        .card-stats:hover { transform: translateY(-5px); }
        .icon-shape { width: 48px; height: 48px; display: flex; align-items: center; justify-content: center; border-radius: 12px; }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block sidebar px-0 shadow">
            <div class="p-4 text-center">
                <h4 class="fw-bold text-white mb-0">IELTS <span class="text-danger">FIGHTER</span></h4>
                <small class="text-muted">Hệ thống quản trị</small>
            </div>
            <div class="nav flex-column mt-3">
                <a href="#" class="nav-link active"><i class="bi bi-speedometer2 me-2"></i> Tổng quan</a>
                <a href="#" class="nav-link"><i class="bi bi-people me-2"></i> Quản lý Học viên</a>
                <a href="#" class="nav-link"><i class="bi bi-person-badge me-2"></i> Đội ngũ Giảng viên</a>
                <a href="#" class="nav-link"><i class="bi bi-book me-2"></i> Quản lý Khóa học</a>
                <a href="#" class="nav-link"><i class="bi bi-geo-alt me-2"></i> Quản lý Cơ sở</a>
                <a href="#" class="nav-link"><i class="bi bi-chat-dots me-2"></i> Tư vấn mới <span class="badge bg-danger ms-auto">5</span></a>
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
                <div>
                    <h2 class="fw-bold mb-0">Chào mừng trở lại, {{ $user->name }}!</h2>
                    <p class="text-muted small">Đây là những gì đang diễn ra tại các cơ sở hôm nay.</p>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-white shadow-sm border rounded-pill"><i class="bi bi-download me-1"></i> Xuất báo cáo</button>
                    <button class="btn btn-danger shadow-sm rounded-pill"><i class="bi bi-plus-lg me-1"></i> Tạo lớp mới</button>
                </div>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-3">
                    <div class="card card-stats shadow-sm p-3">
                        <div class="d-flex align-items-center">
                            <div class="icon-shape bg-primary text-white shadow"><i class="bi bi-people-fill fs-4"></i></div>
                            <div class="ms-3">
                                <p class="text-muted mb-0 small">Tổng học viên</p>
                                <h4 class="fw-bold mb-0">{{ number_format($stats['total_students']) }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-stats shadow-sm p-3">
                        <div class="d-flex align-items-center">
                            <div class="icon-shape bg-warning text-white shadow"><i class="bi bi-telephone-inbound fs-4"></i></div>
                            <div class="ms-3">
                                <p class="text-muted mb-0 small">Tư vấn mới</p>
                                <h4 class="fw-bold mb-0">+{{ $stats['new_leads'] }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-stats shadow-sm p-3">
                        <div class="d-flex align-items-center">
                            <div class="icon-shape bg-success text-white shadow"><i class="bi bi-door-open fs-4"></i></div>
                            <div class="ms-3">
                                <p class="text-muted mb-0 small">Lớp đang mở</p>
                                <h4 class="fw-bold mb-0">{{ $stats['active_classes'] }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-stats shadow-sm p-3">
                        <div class="d-flex align-items-center">
                            <div class="icon-shape bg-danger text-white shadow"><i class="bi bi-currency-dollar fs-4"></i></div>
                            <div class="ms-3">
                                <p class="text-muted mb-0 small">Doanh thu dự kiến</p>
                                <h4 class="fw-bold mb-0">{{ $stats['revenue_month'] }}đ</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-8">
                    <div class="card border-0 shadow-sm p-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="fw-bold mb-0">Đăng ký tư vấn gần đây</h5>
                            <a href="#" class="btn btn-sm btn-link text-danger">Xem tất cả</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Học viên</th>
                                        <th>SĐT</th>
                                        <th>Mục tiêu</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Nguyễn Văn Thành</strong><br><small class="text-muted">thanhnv@gmail.com</small></td>
                                        <td>0912.345.xxx</td>
                                        <td><span class="badge bg-info">7.0 IELTS</span></td>
                                        <td><span class="badge bg-warning text-dark">Chờ gọi</span></td>
                                        <td><button class="btn btn-sm btn-outline-primary">Hỗ trợ</button></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Lê Thị Mai</strong><br><small class="text-muted">maile@gmail.com</small></td>
                                        <td>0988.777.xxx</td>
                                        <td><span class="badge bg-info">6.5 IELTS</span></td>
                                        <td><span class="badge bg-success">Đã tư vấn</span></td>
                                        <td><button class="btn btn-sm btn-outline-primary">Chi tiết</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm p-4">
                        <h5 class="fw-bold mb-3">Phân bổ theo cơ sở</h5>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Hà Nội (Cầu Giấy)</span>
                            <span class="fw-bold">450</span>
                        </div>
                        <div class="progress mb-3" style="height: 8px;">
                            <div class="progress-bar bg-danger" style="width: 45%"></div>
                        </div>

                        <div class="d-flex justify-content-between mb-2">
                            <span>Đà Nẵng (Hải Châu)</span>
                            <span class="fw-bold">300</span>
                        </div>
                        <div class="progress mb-3" style="height: 8px;">
                            <div class="progress-bar bg-warning" style="width: 30%"></div>
                        </div>

                        <div class="d-flex justify-content-between mb-2">
                            <span>TP.HCM (Quận 10)</span>
                            <span class="fw-bold">500</span>
                        </div>
                        <div class="progress mb-3" style="height: 8px;">
                            <div class="progress-bar bg-success" style="width: 50%"></div>
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
