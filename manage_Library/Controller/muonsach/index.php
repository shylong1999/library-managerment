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
				$pass_ = $_POST['pass']; //pass ko sử dụng mã hóa
				$tblTable = 'thanhvien';
				$test_User = $db->testUser($tblTable,$user,$pass);
				if ($test_User >=1) {
					$_SESSION['user'] = $user;
					if (isset($_POST['remember'])) { //kiểm tra xem có check nhớ mật khẩu hay không?
						setcookie('user',$user,time()+3600,'/','',0,0);
						setcookie('pass',$pass_,time()+3600,'/','',0,0);
					}else{
						setcookie('user','',time()-3600,'/','',0,0);
						setcookie('pass','',time()-3600,'/','',0,0);
					}
					
					header('location: index.php?controller=muon-sach&action=list');
				}
				else{
					$thatbai[] = 'thatbai';

				}
			}
			require_once('View/dangnhap/login.php');
			break;
		case 'changepass':

			if (isset($_POST['submit'])) {
				$tblTable = 'thanhvien';
				$user = $_SESSION['user'];
				$oldpass = md5($_POST['oldpass']);
				$newpass = md5($_POST['newpass']);
				$newpass_verify = md5($_POST['newpass_verify']);
				$count_User = $db->getCountAcc($tblTable,$user,$oldpass);
				// print_r(count_User);die("xxx");
				if ($newpass != $newpass_verify) {
					$thatbai[] = 'change_lose';
				} else{
					if ($count_User >= 1) {
						if ($db->updatePassword($tblTable,$user,$newpass)) {
							$success[] = 'change_success';
						}
					} else {
						die('khong hop le:'.$oldpass);
					}
				}
				
			}
			require_once('View/dangnhap/changePassword.php');
			break;

		case 'logout':
			// require_once('View/dangnhap/logout.php');
			$user = $_POST['user'];
			$pass_ = $_POST['pass'];
			session_start();
			unset($_SESSION['user']);
			session_destroy();
			setcookie('user','',time()-3600,'/','',0,0);
			setcookie('pass','',time()-3600,'/','',0,0);
			header("location: index.php?controller=muon-sach&action=login");
			break;
		

		case 'dangky':

			if (isset($_POST['add_acc'])) {
				$tblTable = 'thanhvien';
				$table = 'student';
				$name = $_POST['name'];
				$studentID = $_POST['studentID'];
				$username = $_POST['username'];
				$phoneNumber = $_POST['phoneNumber'];
				$password = md5($_POST['password']);
				$confirmpassword = md5($_POST['confirmpassword']);
				$count = $db->testUserAcc($tblTable,$username);
                if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
                    echo "<script>alert('Incorrect verification code');</script>" ;
                } else{
                if ($count < 1) {
					if($db->insertAcc($username,$password) && $db->insertStudent($table,$studentID,$name,$phoneNumber,$username)){
						$success[] = 'add_success';
					}
				}
				else{
                    $thatbai[] = 'thatbai';
				}
                }
			}

			require_once('View/dangnhap/dangky.php');
			break;

		default:
			# code...
			break;
	}
 ?>