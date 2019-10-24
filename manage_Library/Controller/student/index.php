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
            require_once('View/student/studentUpdate.php');
            break;
        case 'studentBorrowBook':
            $tblTable1 = 'student';
            $tblTable2 = 'muonsach';
            $username = $_SESSION['user'];
            $borrowedBook = $db->getDataBorrowBook($tblTable1,$tblTable2,$username);
            require_once('View/student/getBorrowBook.php');
            break;
        default:
            # code...
            break;
    }
?>