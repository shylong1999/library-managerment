<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<title>Quản lý thư viện</title>
</head>
<body>
	
</body>
</html>

<?php
	include "Model/DBConnect.php";
	$db = new Database;
	$db->connect();


	if (isset($_GET['controller'])) {
		$controller = $_GET['controller'];
	}
	else{
		$controller = '';
	}

	switch ($controller) {
		case 'muon-sach':
			require_once('Controller/muonsach/index.php');
			break;
		case 'thuvien-sach':
			require_once('Controller/thuviensach/index.php');
			break;
	}
?>