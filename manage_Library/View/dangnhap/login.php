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
			    <label for="user">Username:</label>
			    <input type="text" class="form-control" name="user">
			</div>
			<div class="form-group">
			    <label for="pass">Password:</label>
			    <input type="password" class="form-control" name="pass">
			</div>
			<div class="checkbox">
			    <label><input type="checkbox"> Remember me</label>
			   	<label> <a href="index.php?controller=muon-sach&action=dangky">Đăng ký</a></label>
			</div>
			<button type="submit" class="btn btn-success">Submit</button>
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
		<?php 
			if (isset($thatbai) && in_array('thatbai',$thatbai)) {
				echo "<p style = 'color: red; text-align:center;'>Đăng nhập không thành công</p>";
			}
			
		 ?>
	</div>
</body>
</html>