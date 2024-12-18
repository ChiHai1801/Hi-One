<?php
// Bao gồm file kết nối cơ sở dữ liệu
include './../db_database/db_connection.php';
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Mục</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <?php
        // Hiển thị thông báo nếu có
        if (isset($_SESSION['message'])): ?>
            <div class="alert alert-<?php echo $_SESSION['msg_type']; ?>">
                <?php 
                    echo $_SESSION['message']; 
                    unset($_SESSION['message']); // Xóa thông báo sau khi hiển thị
                ?>
            </div>
        <?php endif; ?>

        <?php
        // Kiểm tra xem có ID trong URL không
        if (isset($_GET['id'])) {
            $item_id = $_GET['id'];
            $sql = "SELECT * FROM items WHERE id='$item_id'";
            $result = $conn->query($sql);
            $item = $result->fetch_assoc();
        ?>

        <a href="./add.php" class="btn btn-secondary">Quay lại</a>
        <h2 class="mt-4 text-center">Chỉnh Sửa Mục</h2>
        <form id="editForm" method="post" action="./update.php" class="mb-4 mx-auto" style="max-width: 400px;">
            <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">
            <div class="form-group text-center">
                <label for="updated_item">Tên Mục:</label>
                <input type="text" name="updated_item" id="updated_item" class="form-control" value="<?php echo $item['name']; ?>" required>
            </div>
            <button type="button" class="btn btn-primary btn-block" onclick="confirmEdit()">Cập nhật</button>
        </form>

        <?php
        } else {
            echo "<p class='text-center'>Không có mục nào để sửa.</p>";
        }
        ?>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function confirmEdit() {
            if (confirm("Bạn có chắc chắn muốn cập nhật mục này?")) {
                document.getElementById("editForm").submit(); // Gửi form nếu người dùng xác nhận
            }
        }
    </script>
</body>
</html>

<?php
$conn->close();
?>