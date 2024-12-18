<?php

include './../db_database/db_connection.php'; // Kết nối đến cơ sở dữ liệu

// Xử lý khi người dùng nhấn nút "Đăng nhập"
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $error_message = '';

    // Mã hóa mật khẩu bằng MD5
    $hashed_password = md5($password);

    // Truy vấn kiểm tra thông tin đăng nhập
    $stmt = $conn->prepare("SELECT role FROM admin WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $hashed_password);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($role);
    $stmt->fetch();

    if ($stmt->num_rows > 0) {
        $_SESSION['username'] = $username; // Lưu trạng thái đăng nhập
        $_SESSION['role'] = $role; // Lưu vai trò người dùng

        // Chuyển hướng đến trang chào mừng dựa trên vai trò
        if ($role === 'admin') {
            header("Location: ./../admin.php"); // Trang cho admin
        } else {
            header("Location: ./../client.php"); // Trang cho khách hàng
        }
        exit(); // Dừng thực thi mã sau khi chuyển hướng
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        // Validate username
        if (strlen($username) < 6) {
            $error_message = "Tên đăng nhập phải có ít nhất 6 ký tự.";
        } 
        // Validate password
        elseif (strlen($password) < 6 || 
                !preg_match('/[A-Z]/', $password) || 
                !preg_match('/[a-z]/', $password) || 
                !preg_match('/[0-9]/', $password) || 
                !preg_match('/[\W_]/', $password)) {
            $error_message = "Mật khẩu phải có ít nhất 6 ký tự, bao gồm chữ in hoa, chữ thường, số và ký tự đặc biệt.";
        } else {
            // Proceed with login process (e.g., check credentials in the database)
            // Assuming process_login.php handles the login logic
            // If login is successful, redirect or set session variables
        }
    } else {
        $error_message = "Tên đăng nhập hoặc mật khẩu không đúng!";
    }

    $stmt->close();
}

$conn->close();
?>