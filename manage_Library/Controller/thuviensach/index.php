<?php 
	if (isset($_GET['action'])) {
		$action = $_GET['action'];
	}
	else{
		$action = '';
	}

	$success_img = array();
	switch ($action) {
		case 'addBook':
			// $data_img = NULL;
			if (isset($_FILES['fileToUpload'])) {
				$error = array();
				$file_name = $_FILES['fileToUpload']['name'];
				$file_size = $_FILES['fileToUpload']['size'];
				$file_tmp = $_FILES['fileToUpload']['tmp_name'];
				$file_type = $_FILES['fileToUpload']['type'];



				$extensions = array("jpeg","jpg","png");
				move_uploaded_file($file_tmp,"C:/xampp/htdocs/manage_Library/image/$file_name" );
				if (isset($_POST['tensach']) && isset($_POST['tacgia'])) {
					$name_book = $_POST['tensach'];
					$author = $_POST['tacgia'];
					if($db->insertImg($name_book,$author,$file_name,$file_type,$file_size)) {
						$success_img[] = 'add_success';
					}
				}	
				// $data_img = $file_name;	
			}

			require_once('View/thuviensach/add_book.php');
			break;

		case '':
			# code...
			break;
		case 'listSach':
			$tblTable = 'sach';
			$data_Sach = $db->getAllData($tblTable);
			require_once('View/thuviensach/listsach.php');
			break;
		default:
			# code...
			break;
	}


 ?>