<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['username'])) {
    header("Location: login/login.php");
    exit();
}

// Xử lý khi người dùng gửi form để thêm mục
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['new_item'])) {
    $new_item = $_POST['new_item'];
    
    // Thêm mục mới vào cơ sở dữ liệu
    $sql = "INSERT INTO items (name) VALUES ('$new_item')";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Mục mới đã được thêm thành công!</div>";
    } else {
        echo "<div class='alert alert-danger'>Lỗi: " . $conn->error . "</div>";
    }
}

// Lấy danh sách các mục từ cơ sở dữ liệu
$sql = "SELECT * FROM items";
$result = $conn->query($sql);

// Truy vấn để lấy danh sách các mục, sắp xếp theo ID giảm dần
$sql = "SELECT * FROM items ORDER BY id DESC"; // Sắp xếp theo ID giảm dần
$result = $conn->query($sql);

$conn->close();
?>