<?php
// Xử lý khi người dùng gửi form để xóa mục
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    
    // Xóa mục khỏi cơ sở dữ liệu
    $sql = "DELETE FROM items WHERE id='$delete_id'";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Mục đã được xóa thành công!</div>";
    } else {
        echo "<div class='alert alert-danger'>Lỗi: " . $conn->error . "</div>";
    }
}