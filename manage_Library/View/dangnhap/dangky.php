<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng kí tài khoản - Quản lý thư viện</title>
</head>
<body>
	<div class="dangky_acc">
		<a href="index.php?controller=muon-sach&action=login">Quay lại đăng nhập</a>
		<h3>Đăng ký tài khoản</h3>
		<form action="" method="POST">
			<div class="form-group">
			    <label for="username">Username:</label>
			    <input type="text" class="form-control" name="username" required="required" placeholder="Nhập Username">
			</div>
			<div class="form-group">
			    <label for="password">Password:</label>
			    <input type="password" class="form-control" name="password" required="required" placeholder="Nhập Password">
			</div>
			<button type="submit" class="btn btn-default" name="add_acc" 
			onclick="return confirm('Bạn có chắc chắn muốn đăng kí tài khoản?')">Đăng ký</button>
			<!-- <table>
				<tr>
					<td>Username:</td>
					<td><input style="font-size: 20px;" type="text" name="username" required="required" placeholder="Nhập tài khoản"></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input style="font-size: 20px;" type="password" name="password" required="required" placeholder="Nhập mật khẩu">
				</tr>
				
				<tr>
					<td>&nbsp;</td>
					<td><input style="font-size: 20px; background: #EAD2D2; text-align: center;"  type="submit" name="add_acc" value="Đăng kí" onclick="return confirm('Bạn có chắc chắn muốn đăng kí tài khoản?')"></td>
				</tr>
			</table> -->
		</form>
		<?php 
			if (isset($success) && in_array('add_success',$success)) {
				echo "<p style = 'color: red; text-align:center;'>Đăng kí thành công</p>";
			}
			// else{
			// 	echo "<p style = 'color: red; text-align:center;'>Thêm mới thất bại</p>";
			// }
		 ?>
	</div>	
</body>
</html>