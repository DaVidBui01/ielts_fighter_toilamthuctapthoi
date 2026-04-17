<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard - IELTS Fighter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root { --fighter-red: #e63946; }
        body { background-color: #f4f7f6; }
        .sidebar { min-height: 100vh; background: #fff; border-right: 1px solid #ddd; }
        .nav-link { color: #333; padding: 12px 20px; border-radius: 8px; margin: 5px 15px; }
        .nav-link.active { background: var(--fighter-red); color: white !important; }
        .nav-link:hover:not(.active) { background: #f8d7da; color: var(--fighter-red); }
        .card-custom { border: none; border-radius: 15px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        .progress { height: 10px; border-radius: 5px; }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block sidebar px-0 pt-3 shadow-sm">
            <div class="text-center mb-4">
                <h4 class="fw-bold text-danger">IELTS FIGHTER</h4>
                <p class="small text-muted">Học viên: <strong>{{ $user->name }}</strong></p>
            </div>
            <div class="nav flex-column">
                <a href="#" class="nav-link active"><i class="bi bi-house-door me-2"></i> Tổng quan</a>
                <a href="#" class="nav-link"><i class="bi bi-calendar-event me-2"></i> Lịch học</a>
                <a href="#" class="nav-link"><i class="bi bi-journal-text me-2"></i> Kết quả thi</a>
                <a href="#" class="nav-link"><i class="bi bi-cloud-download me-2"></i> Tài liệu</a>
                <hr class="mx-3">
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
                <h2 class="fw-bold">Bảng điều khiển học viên</h2>
                <span class="badge bg-white text-dark shadow-sm p-2 rounded-pill border">
                    <i class="bi bi-clock me-1 text-danger"></i> {{ date('d/m/Y') }}
                </span>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <div class="card card-custom p-4 text-center">
                        <p class="text-muted mb-1">Tiến độ khóa học</p>
                        <h3 class="fw-bold">{{ $progress }}%</h3>
                        <div class="progress mt-2">
                            <div class="progress-bar bg-danger" style="width: {{ $progress }}%"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-custom p-4 text-center border-start border-danger border-5">
                        <p class="text-muted mb-1">Mục tiêu đầu ra</p>
                        <h3 class="fw-bold text-danger">6.5+ IELTS</h3>
                        <p class="small text-muted mb-0">Khóa: Fighter A</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-custom p-4 text-center">
                        <p class="text-muted mb-1">Điểm Mock Test gần nhất</p>
                        <h3 class="fw-bold text-success">6.25 Overall</h3>
                        <p class="small text-muted mb-0">Ngày thi: 15/04/2026</p>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-7">
                    <div class="card card-custom p-4 h-100">
                        <h5 class="fw-bold mb-3">Lịch học tuần này</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                <div>
                                    <h6 class="mb-0 fw-bold">Thứ 2 (19:00 - 21:00)</h6>
                                    <small class="text-muted">Listening & Speaking - GV. Ms. Hoa</small>
                                </div>
                                <span class="badge bg-success rounded-pill">Sắp diễn ra</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                <div>
                                    <h6 class="mb-0 fw-bold">Thứ 4 (19:00 - 21:00)</h6>
                                    <small class="text-muted">Reading & Writing - GV. Ms. Hoa</small>
                                </div>
                                <span class="badge bg-secondary rounded-pill">Chưa diễn ra</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="card card-custom p-4 h-100 shadow">
                        <h5 class="fw-bold mb-3">Chi tiết kỹ năng (Mock Test)</h5>
                        @foreach($mockTest as $skill => $score)
                        <div class="mb-3">
                            <div class="d-flex justify-content-between small mb-1">
                                <span>{{ $skill }}</span>
                                <span class="fw-bold">{{ $score }}</span>
                            </div>
                            <div class="progress shadow-sm" style="height: 6px;">
                                <div class="progress-bar bg-info" style="width: {{ ($score/9)*100 }}%"></div>
                            </div>
                        </div>
                        @endforeach
                        <div class="mt-auto text-center">
                            <button class="btn btn-outline-danger btn-sm w-100">Xem phân tích chi tiết</button>
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
