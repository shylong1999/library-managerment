<!DOCTYPE html>
<html lang="en">
<head>
<!--	<meta charset="UTF-8">-->
<!--	<link rel="stylesheet" href="style.css">-->
<!--	<meta name="viewport" content="width=device-width, initial-scale=1">-->
<!--	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">-->
<!--	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
<!--	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->
<!--	<title>Quản lý thư viện</title>-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Quản lý thư viện</title>
    <link rel="apple-touch-icon" sizes="120x120" href="View/favicon/apple-icon-120x120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="View/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="View/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="View/favicon/favicon-16x16.png">
    <!--load progress bar-->
    <script src="View/vendor/pace/pace.min.js"></script>
    <link href="View/vendor/pace/pace-theme-minimal.css" rel="stylesheet" />

    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="View/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="View/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="View/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--Notification msj-->
    <link rel="stylesheet" href="View/vendor/toastr/toastr.min.css">
    <!--Magnific popup-->
    <link rel="stylesheet" href="View/vendor/magnific-popup/magnific-popup.css">
    <!--dataTable-->
    <link rel="stylesheet" href="View/vendor/data-table/media/css/dataTables.bootstrap.min.css">
    <!-- ========================================================= -->
    <link rel="stylesheet" href="View/stylesheets/css/style.css">
</head>
<body>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="View/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="View/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="View/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="View/javascripts/template-script.min.js"></script>
<script src="View/javascripts/template-init.min.js"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
<!--Notification msj-->
<!--<script src="View/vendor/toastr/toastr.min.js"></script>-->
<!--morris chart-->
<script src="View/vendor/chart-js/chart.min.js"></script>
<!--Gallery with Magnific popup-->
<script src="View/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<!--Examples-->
<!--<script src="View/javascripts/examples/dashboard.js"></script>-->

<!--dataTable-->
<script src="View/vendor/data-table/media/js/jquery.dataTables.min.js"></script>
<script src="View/vendor/data-table/media/js/dataTables.bootstrap.min.js"></script>
<!--Examples-->
<script src="View/javascripts/examples/tables/data-tables.js"></script>
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
		case 'students':
			require_once('Controller/student/index.php');
			break;
        case 'requests':
            require_once('Controller/request/index.php');
            break;
        case 'accounts':
            require_once('Controller/account/index.php');
            break;
	}
?>