<?php
session_start();
include './../login/process_login.php';
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            max-width: 400px; /* Đặt chiều rộng tối đa cho form */
            margin: auto; /* Căn giữa form */
            padding: 20px; /* Thêm khoảng cách bên trong */
            background-color: white; /* Màu nền cho form */
            border-radius: 8px; /* Bo góc cho form */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Thêm bóng cho form */
        }
    </style>
</head>

<body>
<div class="container mt-5">
    <div class="login-container">
    <a href="./../client.php" class="btn btn-secondary">Quay lại</a>
        <h2 class="text-center">Đăng Nhập</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="username">Tên đăng nhập:</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Đăng Nhập</button>
            <?php if (isset($error_message)): ?>
                <div class="alert alert-danger mt-3"><?php echo $error_message; ?></div>
            <?php endif; ?>
        </form>
    </div>
</div>
</body>
</html>