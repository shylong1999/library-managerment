<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Đăng kí tài khoản - Quản lý thư viện</title>
</head>
<script type="text/javascript">
    function valid() {
        if (document.add_acc.password.value != document.add_acc.confirmpassword.value) {
            alert("Password and Confirm Password Field do not match  !!");
            document.add_acc.confirmpassword.focus();
            return false;
        }
        return true;
    }
</script>
<body>
<div class="dangky_acc">
    <a href="index.php?controller=muon-sach&action=login">Quay lại đăng nhập</a>
    <h3>Đăng ký tài khoản</h3>
    <form name="add_acc" action="" method="POST" onsubmit="return valid();">
        <div class="form-group">
            <label for="name">Fullname:</label>
            <input type="text" class="form-control" name="name" required="required"
                   placeholder="Enter Fullname">
        </div>
        <div class="form-group">
            <label for="studentID">StudentID:</label>
            <input type="number" class="form-control" name="studentID" required="required"
                   placeholder="Enter StudentID">
        </div>
        <div class="form-group">
            <label for="phoneNumber">Phone Number:</label>
            <input type="text" class="form-control" name="phoneNumber" required="required"
                   placeholder="Enter phoneNumber">
        </div>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" name="username" required="required" placeholder="Enter Username">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" required="required"
                   placeholder="Enter Password">
        </div>
        <div class="form-group">
            <label for="password">Confirm Password:</label>
            <input type="password" class="form-control" name="confirmpassword" required="required"
                   placeholder="Enter Password">
        </div>
        <div class="form-group">
            <label>Verification code : </label>
            <input type="text" name="vercode" maxlength="5" autocomplete="off" required
                   style="width: 150px; height: 25px;"/>&nbsp;<img src="../manage_Library/View/dangnhap/capcha.php">
        </div>
        <button type="submit" class="btn btn-success" style="margin-left: 150px;" name="add_acc"
                onclick="return confirm('Bạn có chắc chắn muốn đăng kí tài khoản?')">Đăng ký
        </button>
    </form>
    <?php
        if (isset($success) && in_array('add_success', $success)) {
            echo "<div class='alert alert-success'>
					<strong>User này đã có người sử dụng!</strong> 
						</div>";
        }

        if (isset($thatbai) && in_array('thatbai', $thatbai)) {
            echo " <div class='alert alert-danger'>
					<strong>User này đã có người sử dụng!</strong> 
						</div>";
        }
    ?>
</div>
</body>
</html>