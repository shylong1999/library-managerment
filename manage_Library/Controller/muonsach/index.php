<?php 
	session_start();
	if (isset($_GET['action'])) {
		$action = $_GET['action'];
	}
	else{
		$action = '';
	}

	$success = array();
	$thatbai = array();

	switch ($action) {
		case 'add':{
			if (isset($_POST['add_info'])) {
				$hoten = $_POST['hoten'];
				$mssv = $_POST['mssv'];
				$tensach = $_POST['tensach'];
				$ngaymuon = $_POST['ngaymuon'];
		
				if($db->insertData($hoten,$mssv,$tensach,$ngaymuon)) {
					$success[] = 'add_success';
				}
			}
			require_once('View/muonsach/add_info.php');
			break;
		}
		case 'edit':
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				$table = "muonsach";
				$dataID = $db->getDataID($table,$id);

				if (isset($_POST['edit_info'])) {
					$hoten = $_POST['hoten'];
					$mssv = $_POST['mssv'];
					$tensach = $_POST['tensach'];
					$ngaymuon = $_POST['ngaymuon'];

					if ($db->updateData($id,$hoten,$mssv,$tensach,$ngaymuon)) {
						header('location: index.php?controller=muon-sach&action=list');
					}
				}
			}
			require_once('View/muonsach/edit_info.php');
			break;

		case 'delete':
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				$table = "muonsach";

				if ($db->deleteData($table,$id)) {
						header('location: index.php?controller=muon-sach&action=list');
				}
			}
			break;
		case 'list':
			$tblTable = 'muonsach';
			$data = $db->getAllData($tblTable);
			require_once('View/muonsach/list.php');
			break;
		case 'search':
			if (isset($_GET['key'])) {
				$key = $_GET['key'];
				$tblTable = "muonsach";
				$data_Search = $db->searchData($tblTable,$key);
			}
			require_once('View/muonsach/search_info.php');
			break;
		case 'login':
			if (isset($_POST['user']) && isset($_POST['pass'])) {
				$user = $_POST['user'];
				$pass = md5($_POST['pass']);
				$tblTable = 'thanhvien';
				$test_User = $db->testUser($tblTable,$user,$pass);	
				// setcookie('user',$user,time()+30000);
				// setcookie('pass',$pass,time()+30000);
				if ($test_User >=1) {
					$_SESSION['user'] = $user;
					header('location: index.php?controller=muon-sach&action=list');
				}
				else{
					$thatbai[] = 'thatbai';

				}
			}
			require_once('View/dangnhap/login.php');
			break;

		case 'dangky':

			if (isset($_POST['add_acc'])) {
				$tblTable = 'thanhvien';
				$username = $_POST['username'];
				$password = md5($_POST['password']);
				$count = $db->testUserAcc($tblTable,$username);
				if ($count < 1) {
					if($db->insertAcc($username,$password)){
						$success[] = 'add_success';
					}
				}
				else{
					echo "Username này đã có người sử dụng!";
				}
			}

			require_once('View/dangnhap/dangky.php');
			break;

		default:
			# code...
			break;
	}
 ?>