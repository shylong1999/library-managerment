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
    <title>Change Password</title>
</head>
<body>
<div class="login">
    <h2>Đổi mật khẩu</h2>
    <a href="index.php?controller=muon-sach&action=list">Danh sách</a>
    <form action="" method="POST">

        <div class="form-group">
            <label for="pass">Password cũ:</label>
            <input type="password" class="form-control" name="oldpass" required="required">
        </div>
        <div class="form-group">
            <label for="newpass">Password mới:</label>
            <input type="password" class="form-control" name="newpass" required="required">
        </div>
        <div class="form-group">
            <label for="newpass">Password mới:</label>
            <input type="password" class="form-control" name="newpass_verify" required="required">
        </div>

        <button type="submit" class="btn btn-success" name="submit">Submit</button>

    </form>

    <?php
        if (isset($success) && in_array('change_success', $success)) {
            echo " <div class='alert alert-success'>
 					<strong>Thay đổi mật khẩu thành công!</strong> 
				</div>";
        }
        if (isset($thatbai) && in_array('change_lose', $thatbai)) {
            echo " <div class='alert alert-danger'>
 					<strong>Mật khẩu mới nhập không khớp, mời nhập lại!</strong> 
				</div>";
        }
    ?>
</div>
</body>
</html>