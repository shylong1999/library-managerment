<?php
    session_start();

    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = '';
    }

    switch ($action) {

        case 'listAccount':
            $tblTable1 = 'student';
            $tblTable2 = 'thanhvien';

            $dataAccount = $db->getDataAccounts($tblTable1,$tblTable2);
            $tblStudent = 'student';
            $username = $_SESSION['user'];
            $dataStudents = $db->getDataStudents($tblStudent, $username);
            require_once('View/account/listAccount.php');
            break;
        default:
            # code...
            break;
    }
?>