<!DOCTYPE html>
<html lang="en" class="fixed accounts sign-in">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
</head>
<body style="background: #1b6d85">
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo">
            <img alt="logo" src="View/images/logo-dark.png" />
        </div>
        <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form method="post" action="">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" id="user" name="user" placeholder="Username" value="<?php if (isset($_COOKIE['user'])) echo $_COOKIE['user']; ?>">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" id="password" name="pass" placeholder="Password" value="<?php if (isset($_COOKIE['user'])) echo $_COOKIE['pass']; ?>">
                                <i class="fa fa-key"></i>
                            </span>
                        </div>
                        <div class="form-group">
                            <div class="checkbox-custom checkbox-primary">
                                <input type="checkbox" id="remember-me" name="remember" value="option1" <?php if (isset($_COOKIE['user'])) echo "checked"; ?>>
                                <label class="check" for="remember-me">Remember me</label>
                            </div>
                        </div>
                        <div class="form-group">
<!--                            <a href="index.html" class="btn btn-primary btn-block">Sign in</a>-->
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                        <div class="form-group text-center">
                            <a href="pages_forgot-password.html">Forgot password?</a>
                            <hr/>
                            <span>Don't have an account?</span>
<!--                            <a href="pages_register.html" class="btn btn-block mt-sm">Register</a>-->
                            <a href="index.php?controller=muon-sach&action=dangky" class="btn btn-block mt-sm">Đăng ký</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>

</body>
</html>