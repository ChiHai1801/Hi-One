
<?php
session_start();
include './../db_database/db_connection.php';

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['username'])) {
    header("Location: login/login.php");
    exit();
}
// Kiểm tra xem có dữ liệu từ form không
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $item_id = $_POST['item_id'];
    $updated_item = $_POST['updated_item'];

    // Cập nhật thông tin vào cơ sở dữ liệu
    $sql = "UPDATE items SET name='$updated_item' WHERE id='$item_id'";
    
    if ($conn->query($sql) === TRUE) {
        // $_SESSION['message'] = "Cập nhật thành công!";
        $_SESSION['msg_type'] = "success";
    } else {
        $_SESSION['message'] = "Lỗi: " . $conn->error;
        $_SESSION['msg_type'] = "danger";
    }

    // Chuyển hướng về trang thêm mục
    header("Location: ./add.php");
    exit();
}

$conn->close();
?>
<a href="./add.php">Quay lại</a>