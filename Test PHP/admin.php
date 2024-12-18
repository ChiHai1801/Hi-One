<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['username'])) {
    header("Location: login/login.php"); // Chuyển hướng về trang đăng nhập nếu chưa đăng nhập
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chào Mừng</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="bg-primary text-white text-center py-4">
        <h2>Chào Mừng, <?php echo $_SESSION['username']; ?>!</h2>
        <p>Bạn đã đăng nhập thành công.</p>
    </header>

    <div class="container mt-4">
        <div class="row">
            <div class="col text-center">
                <a href="./manage/add.php" class="btn btn-success">Function</a>
                <!-- <a href="./manage/edit.php?id=1" class="btn btn-warning">Sửa Mục</a> Thay đổi ID cho mục cụ thể -->
                <!-- <a href="./manage/delete.php?id=1" class="btn btn-danger">Xóa Mục</a> Thay đổi ID cho mục cụ thể -->
                <br><br>
                <a href="./login/logout.php" class="btn btn-secondary" onclick="confirmLogout()">Đăng xuất</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
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