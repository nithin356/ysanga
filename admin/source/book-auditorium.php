<?php
include "../../backend/access/connect.php";
session_start();
$id = $_SESSION['yn_aid'];
$data = 0;
$name = trim($_POST['sname']);
$email = trim($_POST['semail']);
$phone = trim($_POST['sphone']);
date_default_timezone_set('Asia/Kolkata');
$created = date("Y-m-d H:i:s");
$QueryVerifyReg = mysqli_query($connection, "SELECT * FROM ys_user WHERE yn_phone='$phone' AND yn_email='$email'");
$count = mysqli_num_rows($QueryVerifyReg);
if ($count == 0) {
    $insert = mysqli_query($connection, "INSERT INTO ys_user (yn_phone,yn_name,yn_email,yn_createdtime)VALUES('$phone','$name','$email','$created')");
    $uid = mysqli_insert_id($connection);
    if ($insert) {
        $status = 0;
        $arrival = trim($_POST['adate']);
        $sid = trim($_POST['saudi']);
        $noa = trim($_POST['organisation']);
        $timeSlot = trim($_POST['tslot']);
        $toe = trim($_POST['etype']);
        $price = trim($_POST['price']);
        $others = "N/A";
        $insertservice =  mysqli_query($connection, "INSERT INTO ys_user_service (yn_arrival, yn_organisation, yn_time, yn_eventtype, yn_other, yn_created, yn_sid, yn_uid, yn_s_status,yn_bookedby,yn_s_price) VALUES ('$arrival', '$noa', '$timeSlot','$toe', '$others', '$created', '$sid', '$uid', '$status', '$id', '$price')");
        if (!$insertservice) {
            $delete = mysqli_query($connection, "DELETE FROM ys_user WHERE yn_uid=$uid");
            $data = (array('status' => 'KO', 'message' => 'There was an error, Please try again!' . mysqli_error($connection)));
        } else {
            $data = array("status" => "OK", "message" => "success");
        }
    } else {
        $data = array("status" => "KO", "message" => "Failed to Book your Data!" . mysqli_error($connection));
    }
} else {
    $data = array("status" => "KO", "message" => "Failed Creating User Phone number or email already Exists!");
}
echo json_encode($data);
