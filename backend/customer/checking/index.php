<?php
include_once '../../access/connect.php';
session_start();
$sid =  $_SESSION['yn_sid'];
$uid =  $_SESSION['yn_uid'];
$arrival =  $_POST['arrival'];
$timeSlot =  $_POST['timeSlot'];
$toe =  $_POST['toe'];
$noa =  $_POST['noa'];
$others =  $_POST['others'];
date_default_timezone_set('Asia/Kolkata');
$created = date("Y-m-d H:i:s");
$fromSession = $_POST['edit'];
$status = 0;
if ($fromSession == 1) {
    $usid =  $_SESSION['yn_us_id'];
    $update =  mysqli_query($connection, "UPDATE ys_user_service SET yn_arrival='$arrival', yn_organisation='$noa', yn_time='$timeSlot', yn_eventtype='$toe', yn_other='$others'  WHERE yn_us_id='$usid'");
    if (!$update) {
        $data = (array('status' => 'KO', 'message' => 'There was an error, Please try again!'));
    } else {
        $data = array("status" => "OK", "message" => "success");
    }
} else {
    $disprice = mysqli_fetch_assoc(mysqli_query($connection,"SELECT * ys_service WHERE yn_sid='$sid'"));
    $price = $disprice;
    $insert =  mysqli_query($connection, "INSERT INTO ys_user_service (yn_arrival, yn_organisation, yn_time, yn_eventtype, yn_other, yn_created, yn_sid, yn_uid, yn_s_status, yn_s_price) VALUES ('$arrival', '$noa', '$timeSlot','$toe', '$others', '$created', '$sid', '$uid', '$status', '$price')");
    if (!$insert) {
        $data = (array('status' => 'KO' . mysqli_error($connection), 'message' => 'There was an error, Please try again!'));
    } else {
        $data = array("status" => "OK", "message" => "success");
    }
}
echo json_encode($data);
