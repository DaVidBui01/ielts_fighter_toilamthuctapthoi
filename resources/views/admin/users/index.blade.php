<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý người dùng - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root { --fighter-red: #e63946; }
        body { background-color: #f0f2f5; }
        .sidebar { min-height: 100vh; background: #2d3436; color: white; }
        .sidebar .nav-link { color: rgba(255,255,255,0.7); padding: 12px 20px; }
        .sidebar .nav-link.active { color: white; background: rgba(255,255,255,0.1); border-left: 4px solid var(--fighter-red); }
        .table-container { background: white; border-radius: 15px; padding: 20px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block sidebar px-0 shadow">
            <div class="p-4 text-center">
                <h4 class="fw-bold text-white mb-0">IELTS <span class="text-danger">FIGHTER</span></h4>
            </div>
            <div class="nav flex-column mt-3">
                <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="bi bi-speedometer2 me-2"></i> Tổng quan</a>
                <a href="{{ route('admin.users') }}" class="nav-link active"><i class="bi bi-people me-2"></i> Quản lý Học viên</a>
                <a href="#" class="nav-link"><i class="bi bi-person-badge me-2"></i> Giảng viên</a>
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
                <h2 class="fw-bold">Danh sách người dùng</h2>
                <button class="btn btn-danger rounded-pill px-4"><i class="bi bi-plus-lg me-2"></i>Thêm học viên mới</button>
            </div>

            <div class="table-container">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Họ và tên</th>
                                <th>Email</th>
                                <th>Ngày đăng ký</th>
                                <th>Vai trò</th>
                                <th class="text-center">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>#{{ $user->id }}</td>
                                <td><strong>{{ $user->name }}</strong></td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                <td>
                                    @if($user->email == 'admin@gmail.com')
                                        <span class="badge bg-danger">Admin</span>
                                    @else
                                        <span class="badge bg-primary">Student</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $users->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </main>
    </div>
</div>

</body>
</html>
