<?php
include_once '../../access/connect.php';
session_start();
$uid =  $_SESSION['yn_uid'];
$sid =  $_SESSION['yn_sid'];
$usid =  $_SESSION['yn_us_id'];
$sessionservice = mysqli_query($connection, "SELECT * FROM ys_user_service WHERE yn_sid='$sid' AND yn_uid='$uid' AND yn_us_id='$usid'");

$count = mysqli_num_rows($sessionservice);
if ($count > 0) {
    $rowservice = mysqli_fetch_assoc($sessionservice);
    $booking = array("timeslot" => $rowservice['yn_time'], "arrival" => $rowservice['yn_arrival'], "org" => $rowservice['yn_organisation'], "status" => $rowservice['yn_s_status'], "eventtype" => $rowservice['yn_eventtype'], "other" => $rowservice['yn_other'], "created" => $rowservice['yn_created']);
    $data = array("status" => "OK", "message" => "success", "booking" => $booking);
} else {
    $data = array("status" => "KO", "message" => "There was an error, Please try again!");
}
echo json_encode($data);
