<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - IELTS Fighter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .login-container { margin-top: 100px; max-width: 400px; }
        .btn-fighter { background-color: #e63946; color: white; }
        .btn-fighter:hover { background-color: #d62828; color: white; }
        .card-header { background-color: #e63946; color: white; text-align: center; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center">
        <div class="card login-container shadow">
            <div class="card-header">IELTS FIGHTER - LOGIN</div>
            <div class="card-body">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" placeholder="admin@gmail.com" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-fighter w-100">Đăng nhập</button>
                </form>
                <div class="mt-3 text-center">
                    <a href="{{ route('register') }}" class="text-decoration-none">Chưa có tài khoản? Đăng ký ngay</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
