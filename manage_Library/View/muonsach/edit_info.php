<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sửa thông tin - Quản lý thư viện</title>
</head>
<body>
	<div class="suathongtin">
		<a style="color: #15CCF3" href="index.php?controller=muon-sach&action=list" class="list">Danh sách</a>
		<h3>Sửa thông tin mượn sách</h3>
		<form action="" method="POST">
			<table>
				<tr>
					<td>Tên thành viên:</td>
					<td><input style="font-size: 20px;" type="text" name="hoten" value="<?php echo $dataID['hoten']; ?>" placeholder="Họ Tên"></td>
				</tr>
				<tr>
					<td>MSSV:</td>
					<td><input style="font-size: 20px;" type="text" name="mssv" value="<?php echo $dataID['mssv']; ?>" placeholder="MSSV"></td>
				</tr>
				<tr>
					<td>Tên sách:</td>
					<td><input style="font-size: 20px;" type="text" name="tensach" value="<?php echo $dataID['tensach']; ?>" placeholder="Tên sách"></td>
				</tr>
				<tr>
					<td>Ngày mượn:</td>
					<td><input style="font-size: 20px;" type="date" name="ngaymuon" value="<?php echo $dataID['ngaymuon']; ?>" placeholder="Ngày mượn"></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input style="font-size: 20px; background: #EAD2D2;" type="submit" name="edit_info" value="Cập nhật" onclick="return confirm('Bạn có chắc chắn muốn sửa không?')"></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>