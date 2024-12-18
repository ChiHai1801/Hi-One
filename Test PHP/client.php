<?php
session_start();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giao Diện Khách Hàng</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
        .product-card {
            margin: 15px 0;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>Chào Mừng Đến Với Cửa Hàng Của Chúng Tôi</h1>
    <p>Khám phá các sản phẩm tuyệt vời của chúng tôi!</p>
    
    <?php if (isset($_SESSION['username'])): ?>
        <p>Xin chào, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>!</p>
        <a href="#" class="btn btn-secondary mb-2 mt-3">Đăng Ký</a>
        <a href="./login/logout.php" class="btn btn-secondary mb-2 mt-3" onclick="confirmLogout()">Đăng Xuất</a>
    <?php else: ?>
        <a href="./login/login.php" class="btn btn-secondary mb-2 mt-3">Đăng Nhập</a>
        <a href="#" class="btn btn-secondary mb-2 mt-3">Đăng Ký</a>
        
    <?php endif; ?>
</div>

<div class="container mt-4">
    <h2 class="text-center">Sản Phẩm Nổi Bật</h2>
    <div class="row">
        <div class="col-md-4 product-card">
            <div class="card">
                <img src="https://via.placeholder.com/300" class="card-img-top" alt="Sản phẩm 1">
                <div class="card-body">
                    <h5 class="card-title">Sản Phẩm 1</h5>
                    <p class="card-text">Mô tả ngắn về sản phẩm 1.</p>
                    <a href="#" class="btn btn-primary">Xem Chi Tiết</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 product-card">
            <div class="card">
                <img src="https://via.placeholder.com/300" class="card-img-top" alt="Sản phẩm 2">
                <div class="card-body">
                    <h5 class="card-title">Sản Phẩm 2</h5>
                    <p class="card-text">Mô tả ngắn về sản phẩm 2.</p>
                    <a href="#" class="btn btn-primary">Xem Chi Tiết</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 product-card">
            <div class="card">
                <img src="https://via.placeholder.com/300" class="card-img-top" alt="Sản phẩm 3">
                <div class="card-body">
                    <h5 class="card-title">Sản Phẩm 3</h5>
                    <p class="card-text">Mô tả ngắn về sản phẩm 3.</p>
                    <a href="#" class="btn btn-primary">Xem Chi Tiết</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <h2 class="text-center">Liên Hệ Chúng Tôi</h2>
    <form>
        <div class="form-group">
            <label for="name">Tên của bạn:</label>
            <input type="text" class="form-control" id="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" required>
        </div>
        <div class="form-group">
            <label for="message">Tin nhắn:</label>
            <textarea class="form-control" id="message" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Gửi</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    function confirmLogout() {
        var result = confirm("Bạn có chắc chắn muốn đăng xuất?");
    }
</script>
</body>
</html>