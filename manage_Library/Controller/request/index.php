<?php
    session_start();

    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = '';
    }

    $success = array();
    switch ($action) {
        case 'view-request':

            $tblTable1 = "student";
            $tblTable2 = "request";
            $dataRequest = $db->getDataRequests($tblTable1,$tblTable2);
            require_once('View/request/viewRequest.php');
            break;
        case 'send-request':

            if (isset($_POST['request'])) {
                $tblTable = "request";
                $username = $_SESSION['user'];
                $message = $_POST['message'];

                if($db->insertRequest($tblTable,$username,$message)) {
                    $success[] = 'send_success';
                }
            }
            require_once('View/request/sendRequest.php');
            break;
        case 'delete-request':
            if (isset($_GET['requestID'])) {
                $requestID = $_GET['requestID'];
                $table = "request";

                if ($db->deleteRequest($table,$requestID)) {
                    header('location: index.php?controller=requests&action=view-request');
                }
            }
            break;
        default:
            # code...
            break;
    }
?>