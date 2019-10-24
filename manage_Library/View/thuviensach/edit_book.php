<!DOCTYPE html>
<?php
    session_start();
    //tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
    //nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
    if (!isset($_SESSION['user'])) {
        header('Location: index.php?controller=muon-sach&action=login');
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sửa thông tin sách</title>
</head>
<body>

</body>
</html>