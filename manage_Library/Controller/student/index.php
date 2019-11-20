<?php
    session_start();

    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = '';
    }

    switch ($action) {
        case 'studentInfo':

            $tblTable = 'student';
            $username = $_SESSION['user'];

            $dataStudents = $db->getDataStudents($tblTable, $username);
            require_once('View/student/studentInfo.php');
            break;
        case 'studentUpdate':
            $tblTable = 'student';
            $username = $_SESSION['user'];
            $dataStudents = $db->getDataStudents($tblTable, $username);
            $tb = 'student';
            $user = $_SESSION['user'];
            if (isset($_FILES['Avatar'])){

                $file_avatar = $_FILES['Avatar']['name'];
                $file_tmp = $_FILES['Avatar']['tmp_name'];
                $extensions = array("jpeg","jpg","png");
                move_uploaded_file($file_tmp,"C:/xampp/htdocs/quanlythuvien/manage_Library/View/images/avatar/$file_avatar" );
                if (isset($_POST['submit-avatar'])){
                    $db->updateAvatar($tblTable,$username,$file_avatar);
                    header('location: index.php?controller=students&action=studentInfo');
                }

            }

            if (isset($_POST['submit'])) {
                $class = $_POST['class'];
                $dateOfBirth = $_POST['dateOfBirth'];
                $email = $_POST['email'];
                $phoneNumber = $_POST['phoneNumber'];
                $address = $_POST['address'];
                if ($db->updateInfoStudent($tblTable,$username,$class,$address,$email,$phoneNumber,$dateOfBirth)) {
                    header('location: index.php?controller=students&action=studentInfo');
                }
            }
            require_once('View/student/studentUpdate.php');
            break;
        case 'studentBorrowBook':
            $tblTable1 = 'student';
            $tblTable2 = 'muonsach';
            $username = $_SESSION['user'];
            $borrowedBook = $db->getDataBorrowBook($tblTable1,$tblTable2,$username);
            $tblStudent = 'student';
            $dataStudents = $db->getDataStudents($tblStudent, $username);
            require_once('View/student/getBorrowBook.php');
            break;
        default:
            # code...
            break;
    }
?>