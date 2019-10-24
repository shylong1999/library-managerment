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
    <title>Thêm sách - Quản lý thư viện</title>
</head>
<body>
<div class="addbook">
    <a href="index.php?controller=thuvien-sach&action=listSach">List Sach</a>
    <form action="" method="POST" enctype="multipart/form-data">
        Select image to upload:
        <input type="text" name="tensach" placeholder="Tên sách" required="required">
        <input type="text" name="tacgia" placeholder="Tên tác giả" required="required">
        <input type="text" name="description" placeholder="Mô tả sách">
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload" name="submit">
    </form>

    <?php
        if (isset($success_img) && in_array('add_success', $success_img)) {
            echo "<p style = 'color: red; text-align:center;'>Đăng kí thành công</p>";
        }
        // else{
        // 	echo "<p style = 'color: red; text-align:center;'>Thêm mới thất bại</p>";
        // }
    ?>


</div>
</body>
</html>