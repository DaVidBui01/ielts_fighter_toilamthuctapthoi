<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IELTS Fighter - Chiến binh IELTS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <style>
        /* Quan trọng: Ẩn các phần tử Alpine trước khi nó kịp load */
        [x-cloak] { display: none !important; }

        :root { --main-color: #e63946; }
        .bg-fighter { background-color: var(--main-color) !important; }
        .btn-fighter { background-color: var(--main-color); color: white; border: none; }
        .btn-fighter:hover { background-color: #d62828; color: white; }

        .img-placeholder {
            background: #e9ecef;
            border: 2px dashed #adb5bd;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 300px;
            color: #6c757d;
        }

        .modal-backdrop-custom {
            background: rgba(0,0,0,0.7);
            z-index: 10000;
            backdrop-filter: blur(4px); /* Thêm hiệu ứng mờ cho xịn */
        }
    </style>
</head>
<body x-data="{ showModal: false }" x-cloak>

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-danger" href="/">IELTS FIGHTER</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Khóa học</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Học viên</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Giảng viên</a></li>
                </ul>
                <div class="d-flex">
                    <button type="button" @click="showModal = true" class="btn btn-outline-danger me-2">Tư vấn</button>
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-fighter">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-fighter">Đăng nhập</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <header class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="display-4 fw-bold text-dark">Lộ trình học IELTS cho người mới</h1>
                    <p class="lead">Cam kết đầu ra bằng văn bản. Giáo viên 8.5+ IELTS.</p>
                    <button @click="showModal = true" class="btn btn-fighter btn-lg px-4">Nhận tư vấn miễn phí</button>
                </div>
                <div class="col-md-6 mt-4">
                    <div class="img-placeholder">Banner Placeholder</div>
                </div>
            </div>
        </div>
    </header>

    <section class="py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Các khóa học tiêu biểu</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="img-placeholder" style="height: 180px;">Pre-IELTS</div>
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">Pre-IELTS</h5>
                            <p class="card-text text-muted">Xây dựng nền tảng vững chắc cho người mới bắt đầu (Target 3.0-3.5)</p>
                            <a href="#" class="btn btn-outline-danger">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="img-placeholder" style="height: 180px;">IELTS Fighter A</div>
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">IELTS Fighter A</h5>
                            <p class="card-text text-muted">Bứt phá kỹ năng, chinh phục band điểm trung bình (Target 5.0-5.5)</p>
                            <a href="#" class="btn btn-outline-danger">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="img-placeholder" style="height: 180px;">IELTS Fighter B</div>
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">IELTS Fighter B</h5>
                            <p class="card-text text-muted">Hoàn thiện kỹ năng chuyên sâu, đạt mục tiêu cao (Target 6.5-7.0+)</p>
                            <a href="#" class="btn btn-outline-danger">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white border-top">
        <div class="container text-center">
            <div class="max-width-700 mx-auto shadow-sm p-4 rounded border">
                <h3 class="fw-bold mb-4">Đăng ký giữ chỗ khóa học</h3>
                <form action="#" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-4">
                            <input type="text" name="name" class="form-control" placeholder="Họ tên" required>
                        </div>
                        <div class="col-md-4">
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="phone" class="form-control" placeholder="SĐT" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-fighter mt-4 w-100">Gửi thông tin đăng ký</button>
                </form>
            </div>
        </div>
    </section>

    <template x-if="showModal">
        <div
            class="position-fixed top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center modal-backdrop-custom"
            @click.self="showModal = false"
        >
            <div class="bg-white p-4 rounded shadow-lg" style="max-width: 450px; width: 90%;">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="mb-0 text-danger fw-bold">NHẬN TƯ VẤN MIỄN PHÍ</h4>
                    <button type="button" @click="showModal = false" class="btn-close"></button>
                </div>

                <form>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Họ và tên</label>
                        <input type="text" name="pop_name" class="form-control" placeholder="Nguyễn Văn A">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Số điện thoại</label>
                        <input type="tel" name="pop_phone" class="form-control" placeholder="09xx.xxx.xxx">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Mục tiêu</label>
                        <select name="pop_target" class="form-select">
                            <option value="">Chọn band điểm muốn đạt</option>
                            <option value="5">Band 5.0 - 5.5</option>
                            <option value="6">Band 6.0 - 6.5</option>
                            <option value="7">Band 7.0+</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-danger w-100 py-2 fw-bold">GỬI YÊU CẦU</button>
                </form>
            </div>
        </div>
    </template>

</body>
</html>
