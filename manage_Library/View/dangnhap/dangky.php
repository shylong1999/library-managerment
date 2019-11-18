<!DOCTYPE html>
<html lang="en" class="fixed accounts sign-in">
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
<body style="background: #1b6d85">
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo">
            <img alt="logo" src="View/images/logo-dark.png"/>
        </div>
        <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form name="add_acc" action="" method="POST" onsubmit="return valid();">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Fullname">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="number" class="form-control" id="studentID" name="studentID"
                                       placeholder="Student ID">
                                <i class="fa fa-id-badge"></i>
                            </span>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" id="phoneNumber" name="phoneNumber"
                                       placeholder="Phone Number">
                                <i class="fa fa-phone"></i>
                            </span>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" id="username" name="username"
                                       placeholder="Username">
                                <i class="fa fa-envelope"></i>
                            </span>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" id="password" name="password"
                                       placeholder="Password">
                                <i class="fa fa-key"></i>
                            </span>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" id="confirm-password" name="confirmpassword"
                                       placeholder="Confirm Password">
                                <i class="fa fa-key"></i>
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Verification code : </label>
                            <input type="text" name="vercode" maxlength="5" autocomplete="off" required
                                   style="width: 150px; height: 25px;"/>&nbsp;<img
                                    src="../manage_Library/View/dangnhap/capcha.php">
                        </div>
                        <!--                        <div class="form-group">-->
                        <!--                            <div class="checkbox-custom checkbox-primary">-->
                        <!--                                <input type="checkbox" id="terms" value="option1">-->
                        <!--                                <label class="check" for="terms">I agree </label>  to the <a href="#">Terms and Conditions</a>-->
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block" name="add_acc"
                                    onclick="return confirm('Bạn có chắc chắn muốn đăng kí tài khoản?')">Register
                            </button>
                        </div>
                        <div class="form-group text-center">
                            Have an account?, <a href="index.php?controller=muon-sach&action=login">Sign In</a>
                        </div>
                    </form>
                    <?php
                        if (isset($success) && in_array('add_success', $success)) {
                            echo "<div class='alert alert-success'>
					<strong>Đăng ký thành công!</strong> 
						</div>";
                        }
                        if (isset($thatbai) && in_array('thatbai', $thatbai)) {
                            echo " <div class='alert alert-danger'>
					<strong>User này đã có người sử dụng!</strong> 
						</div>";
                        }
                    ?>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>


<!--</div>-->
</body>
</html>