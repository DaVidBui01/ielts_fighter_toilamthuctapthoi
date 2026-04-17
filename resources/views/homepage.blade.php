<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IELTS Fighter - Chiến binh IELTS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <style>
        [x-cloak] { display: none !important; }
        :root { --main-red: #e63946; --dark-red: #c1272d; }

        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #333; }
        .text-fighter { color: var(--main-red); }
        .bg-fighter { background-color: var(--main-red); color: white; }
        .btn-fighter { background-color: var(--main-red); color: white; border-radius: 25px; padding: 10px 25px; transition: 0.3s; border: none; }
        .btn-fighter:hover { background-color: var(--dark-red); color: white; transform: translateY(-2px); }

        .navbar-brand { font-size: 1.5rem; letter-spacing: 1px; }
        .hero-section { background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%); padding: 80px 0; }

        .stats-box { border-bottom: 4px solid var(--main-red); padding: 20px; text-align: center; background: white; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        .stats-number { font-size: 2.5rem; font-weight: bold; color: var(--main-red); }

        .course-card { border: none; border-radius: 15px; overflow: hidden; transition: 0.3s; }
        .course-card:hover { transform: translateY(-10px); box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .img-placeholder { background: #eee; height: 200px; display: flex; align-items: center; justify-content: center; color: #999; font-style: italic; }

        .modal-backdrop-custom { background: rgba(0,0,0,0.7); z-index: 10000; backdrop-filter: blur(5px); }
    </style>
</head>
<body x-data="{ showModal: false }" x-cloak>

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-fighter" href="/">IELTS FIGHTER</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mx-lg-4">
                    <li class="nav-item"><a class="nav-link fw-semibold" href="#">KHÓA HỌC</a></li>
                    <li class="nav-item"><a class="nav-link fw-semibold" href="#">LỊCH KHAI GIẢNG</a></li>
                    <li class="nav-item"><a class="nav-link fw-semibold" href="#">GIẢNG VIÊN</a></li>
                    <li class="nav-item"><a class="nav-link fw-semibold" href="#">TÀI LIỆU</a></li>
                </ul>
                <div class="d-flex gap-2">
                    <button type="button" @click="showModal = true" class="btn btn-outline-danger rounded-pill px-4">TƯ VẤN</button>
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-fighter">DASHBOARD</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-fighter">ĐĂNG NHẬP</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <header class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h5 class="text-fighter fw-bold mb-3">HÀNH TRÌNH CHINH PHỤC IELTS</h5>
                    <h1 class="display-4 fw-bold mb-4">IELTS Fighter - Học IELTS dễ như ăn bánh</h1>
                    <p class="lead mb-5 text-muted">Chúng tôi nỗ lực mỗi ngày để cùng các bạn chinh phục đỉnh cao IELTS, phục vụ các mục tiêu du học, định cư và công việc phía trước.</p>
                    <div class="d-flex gap-3">
                        <button @click="showModal = true" class="btn btn-fighter btn-lg">ĐĂNG KÝ TƯ VẤN</button>
                        <a href="#courses" class="btn btn-outline-secondary btn-lg rounded-pill">XEM KHÓA HỌC</a>
                    </div>
                </div>
                <div class="col-md-6 text-center mt-5 mt-md-0">
                    <div class="img-placeholder rounded-3 shadow" style="height: 350px;">[Hình ảnh Banner: Đội ngũ Chiến binh IELTS]</div>
                </div>
            </div>
        </div>
    </header>

    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-6 col-md-3">
                    <div class="stats-box">
                        <div class="stats-number">100+</div>
                        <div class="text-muted fw-bold">CƠ SỞ TOÀN QUỐC</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stats-box">
                        <div class="stats-number">1M+</div>
                        <div class="text-muted fw-bold">HỌC VIÊN TIN DÙNG</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stats-box">
                        <div class="stats-number">8.5</div>
                        <div class="text-muted fw-bold">ĐIỂM GV TRUNG BÌNH</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stats-box">
                        <div class="stats-number">89K</div>
                        <div class="text-muted fw-bold">HỌC PHÍ CHỈ TỪ/H</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">TẠI SAO NÊN HỌC TẠI IELTS FIGHTER?</h2>
                <div class="mx-auto bg-fighter mt-2" style="width: 80px; height: 4px;"></div>
            </div>
            <div class="row g-4 text-center">
                <div class="col-md-4">
                    <div class="p-4 shadow-sm rounded-4 h-100 border">
                        <div class="stats-number mb-3" style="font-size: 3rem;">🎯</div>
                        <h5 class="fw-bold">Phương pháp RIPL</h5>
                        <p class="text-muted small">Đột phá kỹ năng thông qua logic và truyền cảm hứng, giúp việc học IELTS không còn là gánh nặng.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 shadow-sm rounded-4 h-100 border">
                        <div class="stats-number mb-3" style="font-size: 3rem;">👨‍🏫</div>
                        <h5 class="fw-bold">Đội ngũ chuyên gia</h5>
                        <p class="text-muted small">100% giảng viên sở hữu chứng chỉ 8.5+ IELTS, giàu kinh nghiệm và tận tâm với từng học viên.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 shadow-sm rounded-4 h-100 border">
                        <div class="stats-number mb-3" style="font-size: 3rem;">📚</div>
                        <h5 class="fw-bold">Giáo trình độc quyền</h5>
                        <p class="text-muted small">Hệ thống tài liệu được biên soạn tinh gọn, bám sát đề thi thực tế tại IDP và British Council.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container text-center">
            <h2 class="fw-bold mb-3">LỘ TRÌNH ĐÀO TẠO CHUẨN QUỐC TẾ</h2>
            <p class="text-muted mb-5">Từ con số 0 đến mục tiêu 7.0+ trong thời gian ngắn nhất</p>
            <div class="img-placeholder rounded-4 shadow-sm w-100" style="height: 450px; background: #dfe4ea; border: 3px dashed #636e72;">
                <div class="text-center">
                    <h3 class="fw-bold text-secondary">[ KHUNG ẢNH LỘ TRÌNH ĐÀO TẠO ]</h3>
                    <p>Học viên có thể chèn ảnh Infographic lộ trình vào đây sau</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white border-bottom">
        <div class="container">
            <div class="row align-items-center bg-light p-4 p-md-5 rounded-4 border shadow-sm">
                <div class="col-md-8">
                    <h2 class="fw-bold text-fighter mb-3">NHỠ HỌC XONG RỒI THI VẪN KHÔNG ĐẠT?</h2>
                    <p class="lead mb-0">Bạn hoàn toàn có thể yên tâm với <strong>Chính sách Bảo hành đầu ra</strong> của chúng tôi.</p>
                    <ul class="mt-3 list-unstyled">
                        <li class="mb-2">✅ Học lại <strong>MIỄN PHÍ</strong> hoàn toàn nếu không đạt mục tiêu.</li>
                        <li class="mb-2">✅ Hỗ trợ bổ trợ kỹ năng yếu ngoài giờ lên lớp.</li>
                        <li class="mb-2">✅ Cam kết bằng văn bản có giá trị pháp lý ngay khi nhập học.</li>
                    </ul>
                </div>
                <div class="col-md-4 text-center">
                    <button @click="showModal = true" class="btn btn-fighter btn-lg w-100 py-3 shadow">TÌM HIỂU CHI TIẾT CAM KẾT</button>
                </div>
            </div>
        </div>
    </section>

    <section id="courses" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">CÁC KHÓA HỌC TẠI IELTS FIGHTER</h2>
                <div class="mx-auto bg-fighter mt-2" style="width: 80px; height: 4px;"></div>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card course-card shadow-sm h-100">
                        <div class="img-placeholder text-center">Khóa học Pre-IELTS<br>(Nền tảng vững chắc)</div>
                        <div class="card-body">
                            <h5 class="fw-bold text-fighter">Pre-IELTS: 0 - 3.5+</h5>
                            <p class="small text-muted">Dành cho người mất gốc, xây dựng lại hệ thống ngữ pháp, từ vựng và phát âm chuẩn.</p>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold">Giá: Liên hệ</span>
                                <button @click="showModal = true" class="btn btn-sm btn-fighter">TƯ VẤN</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card course-card shadow-sm h-100">
                        <div class="img-placeholder text-center">IELTS Fighter A<br>(Target 5.0 - 5.5)</div>
                        <div class="card-body">
                            <h5 class="fw-bold text-fighter">Fighter A: 5.0 - 5.5+</h5>
                            <p class="small text-muted">Tập trung rèn luyện 4 kỹ năng theo chuẩn format đề thi, bứt phá band điểm trung bình.</p>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold">Giá: Liên hệ</span>
                                <button @click="showModal = true" class="btn btn-sm btn-fighter">TƯ VẤN</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card course-card shadow-sm h-100">
                        <div class="img-placeholder text-center">IELTS Fighter B<br>(Target 6.5 - 7.0+)</div>
                        <div class="card-body">
                            <h5 class="fw-bold text-fighter">Fighter B: 6.5 - 7.0+</h5>
                            <p class="small text-muted">Luyện đề chuyên sâu, nắm vững kỹ thuật làm bài band cao và các chủ đề khó.</p>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold">Giá: Liên hệ</span>
                                <button @click="showModal = true" class="btn btn-sm btn-fighter">TƯ VẤN</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-fighter">
        <div class="container text-center">
            <h2 class="fw-bold mb-4">BẠN ĐANG Ở ĐÂU TRÊN LỘ TRÌNH IELTS?</h2>
            <p class="mb-4">Để lại thông tin, IELTS Fighter sẽ tư vấn lộ trình cá nhân hóa hoàn toàn miễn phí!</p>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form class="row g-2">
                        <div class="col-md-4"><input type="text" class="form-control form-control-lg" placeholder="Họ và tên"></div>
                        <div class="col-md-4"><input type="text" class="form-control form-control-lg" placeholder="Số điện thoại"></div>
                        <div class="col-md-4"><button type="button" class="btn btn-dark btn-lg w-100">NHẬN LỘ TRÌNH</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-4 bg-dark text-white text-center">
        <p class="mb-0">&copy; 2026 IELTS Fighter - Chiến binh IELTS. All rights reserved.</p>
    </footer>

    <template x-if="showModal">
        <div class="position-fixed top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center modal-backdrop-custom" @click.self="showModal = false">
            <div class="bg-white p-4 rounded shadow-lg" style="max-width: 450px; width: 90%;">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="mb-0 text-fighter fw-bold">ĐĂNG KÝ TƯ VẤN</h4>
                    <button type="button" @click="showModal = false" class="btn-close"></button>
                </div>
                <form>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Họ và tên</label>
                        <input type="text" name="name" class="form-control" placeholder="Nguyễn Văn A" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Số điện thoại</label>
                        <input type="tel" name="phone" class="form-control" placeholder="09xx.xxx.xxx" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Cơ sở gần bạn</label>
                        <select class="form-select">
                            <option>Hà Nội</option>
                            <option>Đà Nẵng</option>
                            <option>TP. Hồ Chí Minh</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-fighter w-100 py-3 fw-bold">GỬI THÔNG TIN</button>
                </form>
            </div>
        </div>
    </template>

</body>
</html>
