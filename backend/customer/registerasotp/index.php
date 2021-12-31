<?php
include_once '../../access/connect.php';
session_start();
$phone = $_POST['phone'];
$email = $_POST['email'];
$name = $_POST['name'];
date_default_timezone_set('Asia/Kolkata');
$created = date("Y-m-d H:i:s");
$QueryVerifyReg = mysqli_query($connection, "SELECT * FROM ys_user WHERE yn_phone='$phone' AND yn_email='$email'");
$count = mysqli_num_rows($QueryVerifyReg);
if ($count == 0) {
    $insert = mysqli_query($connection, "INSERT INTO ys_user (yn_phone,yn_name,yn_email,yn_createdtime)VALUES('$phone','$name','$email','$created')");
    if ($insert) {
        $data = array("status" => "OK", "message" => "success");
    } else {
        $data = array("status" => "KO", "message" => "There was an error, Please try again!");
    }
} else {
    $data = array("status" => "KO", "message" => "The phone or email is already registered, Please Login!");
}
echo json_encode($data);
