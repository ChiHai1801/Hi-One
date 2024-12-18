<?php
session_start();
session_unset(); // Xóa tất cả các biến phiên
session_destroy(); // Hủy phiên

// Chuyển hướng về trang chủ
header("Location: ../../client.php");
exit();
?>