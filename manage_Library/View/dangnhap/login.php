<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
</head>
<body>
<div class="login">
    <h2>Đăng nhập</h2>
    <form action="" method="POST">
        <!-- <input type="hidden" name="s" value="1"> -->

        <div class="form-group">
            <label for="user"><i class="glyphicon glyphicon-user"></i>Username:</label>
            <input type="text" class="form-control" name="user"
                   value="<?php if (isset($_COOKIE['user'])) echo $_COOKIE['user']; ?>">
        </div>
        <div class="form-group">
            <label for="pass"><i class="glyphicon glyphicon-lock"></i>Password:</label>
            <input type="password" class="form-control" name="pass"
                   value="<?php if (isset($_COOKIE['user'])) echo $_COOKIE['pass']; ?>">
        </div>
        <div class="checkbox" style="margin-left: 100px;">
            <label><input type="checkbox" name="remember" <?php if (isset($_COOKIE['user'])) echo "checked"; ?> >
                Remember me</label>
            <label> <a href="index.php?controller=muon-sach&action=dangky">Đăng ký</a></label>
        </div>

        <button type="submit" class="btn btn-success" style="margin-left: 150px;">Submit</button>
        <!-- <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="user" required="required" placeholder="Nhập tài khoản"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="pass" required="required" placeholder="Nhập mật khẩu"></td>
            </tr>
            <tr style="text-align: center;">
                <td><a href="index.php?controller=muon-sach&action=dangky">Đăng ký</a></td>
                <td><input style="font-size: 20px;" type="submit" name="dangnhap" value="Đăng nhập"></td>
            </tr>
        </table> -->
    </form>

    <!-- Modal -->
    <!-- <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
         -->
    <!-- Modal content-->
    <!-- <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Modal Header</h4>
        </div>
    <div class="modal-body">
        <p></p>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>

</div>
</div> -->

    <?php
        if (isset($thatbai) && in_array('thatbai', $thatbai)) {
            // echo "<p style = 'color: red; text-align:center;'>Đăng nhập không thành công</p>";
            echo " <div class='alert alert-danger'>
					<strong>Đăng nhập không thành công!</strong> 
						</div>";
        }
    ?>
</div>
</body>
</html>