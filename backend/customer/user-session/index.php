<?php
include_once '../../access/connect.php';
session_start();
if (isset($_SESSION['yn_uid'])) {
    $uid =  $_SESSION['yn_uid'];
    $data = array("status" => "OK", "yid" => $_SESSION['yn_uid']);
} else {
    $data = array("status" => "error");
}
echo json_encode($data);
