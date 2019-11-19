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
		    $table = 'sach';
		    $dataBook = $db->getAllData($table);
			if (isset($_POST['add_info'])) {
				$hoten = $_POST['hoten'];
				$mssv = $_POST['mssv'];
				$tensach = $_POST['tensach'];
				$ngaymuon = $_POST['ngaymuon'];
		
				if($db->insertData($hoten,$mssv,$tensach,$ngaymuon)) {
					$success[] = 'add_success';
				}
			}
            $tblStudent = 'student';
            $username = $_SESSION['user'];
            $dataStudents = $db->getDataStudents($tblStudent, $username);
			require_once('View/muonsach/add_info.php');
			break;
		}
		case 'edit':
            $table = 'sach';
            $dataBook = $db->getAllData($table);
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
            $tblStudent = 'student';
            $username = $_SESSION['user'];
            $dataStudents = $db->getDataStudents($tblStudent, $username);
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
            $tblStudent = 'student';
            $username = $_SESSION['user'];
            $dataStudents = $db->getDataStudents($tblStudent, $username);
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
					$_SESSION['level'] =  $test_User['0']['level'];
					if (isset($_POST['remember'])) { //kiểm tra xem có check nhớ mật khẩu hay không?
						setcookie('user',$user,time()+3600,'/','',0,0);
						setcookie('pass',$pass_,time()+3600,'/','',0,0);
					}else{
						setcookie('user','',time()-3600,'/','',0,0);
						setcookie('pass','',time()-3600,'/','',0,0);
					}
					
					header('location: index.php?controller=thuvien-sach&action=listSach');
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
				$dataPassword = $db->getPasswordUser($tblTable, $user); // lấy mật khẩu của user hiện tại
				$count_User = $db->getCountAcc($tblTable,$user,$oldpass);
				// print_r(count_User);die("xxx");
				if ($newpass != $newpass_verify) {
					$success[] = 'change_lose';
				}
				elseif ($oldpass == $newpass){
                    $success[] = 'change_lose';
                }
				elseif ($oldpass != $dataPassword[0]['pass']){
                    $success[] = 'change_lose';
                }
                else{
					if ($count_User >= 1) {
                        if ($db->updatePassword($tblTable, $user, $newpass)) {
                            $success[] = 'change_success';
                        }
                    }
//					} else {
//						die('khong hop le:'.$oldpass);
//					}
				}
				
			}
            $tblStudent = 'student';
            $username = $_SESSION['user'];
            $dataStudents = $db->getDataStudents($tblStudent, $username);
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
					if($db->insertAcc($username,$password) &&  $db->insertStudent($table,$studentID,$name,$phoneNumber,$username)){

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
        case 'view':

            $tblTable1 = "student";
            $tblTable2 = "request";
            $dataRequest = $db->getDataRequests($tblTable1,$tblTable2);
            $table = 'sach';
            $dataBook = $db->getAllData($table);
            $tblTable = 'muonsach';
            $data = $db->getAllData($tblTable);
            $tableRequest = 'request';
            $totalRequest = $db->getTotalRequest($tableRequest);

            $tblTable12 = 'student';
            $username = $_SESSION['user'];
            $dataStudents = $db->getDataStudents($tblTable12, $username);

            $tblTable11 = 'sach';
            $data_Sach = $db->getAllData($tblTable11);
            $tableAccount = 'thanhvien';
            $totalAccount = $db->getTotalAccount($tableAccount);

            if (isset($_FILES['Avatar'])){
                $tb = 'student';
                $user = $_SESSION['user'];
                    $file_avatar = $_FILES['Avatar']['name'];
                    $file_tmp = $_FILES['Avatar']['tmp_name'];
                    $extensions = array("jpeg","jpg","png");
                    move_uploaded_file($file_tmp,"C:/xampp/htdocs/quanlythuvien/manage_Library/View/images/avatar/$file_avatar" );
                    if (isset($_POST['submit-avatar'])){
                        $db->updateAvatar($tb,$user,$file_avatar);
                        header('location: index.php?controller=students&action=studentInfo');
                    }
                if (isset($_POST['submit'])) {
                    $class = $_POST['class'];
                    $dateOfBirth = $_POST['dateOfBirth'];
                    $email = $_POST['email'];
                    $phoneNumber = $_POST['phoneNumber'];
                    $address = $_POST['address'];



                    if ($db->updateInfoStudent($tb,$user,$class,$address,$email,$phoneNumber,$dateOfBirth)) {
                        header('location: index.php?controller=students&action=studentInfo');
                    }
                }
            }

            require_once ('View/muonsach/View.php');
		default:
			# code...
			break;
	}
 ?>