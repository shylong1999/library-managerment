<!DOCTYPE html>
<?php
    //tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
    //nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
    if (!isset($_SESSION['user'])) {
        header('Location: index.php?controller=muon-sach&action=login');
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Đăng kí mượn sách - Quản lý thư viện</title>
</head>
<body>
<div class="dangky">
    <a href="index.php?controller=muon-sach&action=list" class="list">Danh sách</a>
    <h3>Thông tin đăng ký mượn sách</h3>
    <form action="" method="POST">
        <table>
            <tr>
                <td>Tên sinh viên:</td>
                <td><input style="font-size: 20px;" type="text" name="hoten" placeholder="Họ và Tên"></td>
            </tr>
            <tr>
                <td>MSSV:</td>
                <td><input style="font-size: 20px;" type="text" name="mssv" placeholder="MSSV"></td>
            </tr>
            <tr>
                <td>Tên sách</td>
                <td><input style="font-size: 20px;" type="text" name="tensach" placeholder="Tên sách cần mượn"></td>
            </tr>
            <tr>
                <td>Ngày mượn:</td>
                <td><input style="font-size: 20px;" type="date" name="ngaymuon"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input style="font-size: 20px; background: #EAD2D2" type="submit" name="add_info"
                           value="Đăng kí mượn sách"
                           onclick="return confirm('Bạn có chắc chắn muốn đăng kí mượn sách?')"></td>
            </tr>
        </table>
    </form>
    <?php
        if (isset($success) && in_array('add_success', $success)) {
            echo "<p style = 'color: red; text-align:center;'>Đăng kí thành công</p>";
        }
        // else{
        // 	echo "<p style = 'color: red; text-align:center;'>Thêm mới thất bại</p>";
        // }
    ?>
</div>
</body>
</html>