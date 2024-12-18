<?php
// Bao gồm file kết nối cơ sở dữ liệu
include './../db_database/db_connection.php';
include './delete.php';
include './process_add.php';
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Mục</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">

    <a href="./../admin.php" class="btn btn-secondary">Quay lại</a>
        <h2 class="text-center">Thêm Mục Mới</h2>
        <form method="post" action="" class="mb-4 mx-auto" style="max-width: 400px;">
            <div class="form-group">
                <label for="new_item">Tên Mục:</label>
                <input type="text" name="new_item" id="new_item" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Thêm</button>
        </form>
        

        <h2 class="text-center mt-5 ">Danh Sách Các Mục</h2>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Tên Mục</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Hiển thị dữ liệu của từng hàng
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["id"] . "</td>
                                <td>" . $row["name"] . "</td>
                                <td><a href='./edit.php?id=" . $row["id"] . "' class='btn btn-warning btn-sm'>Sửa</a></td>
                                <td>
                                    <form method='post' action='' style='display:inline;'>
                                        <input type='hidden' name='delete_id' value='" . $row["id"] . "'>
                                        <button type='submit' class='btn btn-danger btn-sm' onclick='return confirm(\"Bạn có chắc chắn muốn xóa mục này không [  " . $row["name"] . "  ] ?\");'>Xóa</button>
                                    </form>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center'>Không có mục nào.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>