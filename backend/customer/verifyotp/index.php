<?php
include_once '../../access/connect.php';
session_start();
$phone = $_POST['phone'];
$otp = $_POST['otp'];
$QueryVerifyOTP = mysqli_query($connection, "SELECT * FROM ys_user WHERE yn_phone='$phone'");
$count = mysqli_num_rows($QueryVerifyOTP);
if ($count == 1) {
    $row = mysqli_fetch_assoc($QueryVerifyOTP);
    $checkotp = $row['yn_otp'];
    $uid = $row['yn_uid'];
    if ($otp == $checkotp) {
        //DELETE AFTER VERIFYING
        $deleteVerifyOTP = mysqli_query($connection, "UPDATE ys_user set yn_otp='' WHERE yn_phone = '$phone'");
        $_SESSION['yn_uid'] = $uid;
        $data = array("status" => "OK", "message" => "success");
    } else {
        $data = array("status" => "KO", "message" => "OTP doesnt Match, Try again!");
    }
} else {
    $data = array("status" => "KO", "message" => "There was an error, Please try again!");
}
echo json_encode($data);
