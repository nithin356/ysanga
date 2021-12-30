<?php
include_once '../../access/connect.php';
session_start();
$uid =  $_SESSION['yn_uid'];
$sessionservice = mysqli_query($connection, "SELECT * FROM ys_user_service JOIN ys_service_img on ys_user_service.yn_sid=ys_service_img.yn_s_id JOIN ys_service on ys_user_service.yn_sid=ys_service.yn_sid WHERE yn_s_cover='1' AND yn_uid='$uid'");

$count = mysqli_num_rows($sessionservice);
if ($count > 0) {
    $booking = array();
    while ($rowservice = mysqli_fetch_assoc($sessionservice)) {
        $bookings = array("sid" => $rowservice['yn_sid'], "timeslot" => $rowservice['yn_time'], "arrival" => $rowservice['yn_arrival'], "org" => $rowservice['yn_organisation'], "status" => $rowservice['yn_s_status'], "eventtype" => $rowservice['yn_eventtype'], "other" => $rowservice['yn_other'], "created" => $rowservice['yn_created'], "img" => $rowservice['yn_s_images'], "name" => $rowservice['yn_sname'], "price" => $rowservice['yn_price'], "sdesc" => $rowservice['yn_sdesc'], "uid" => $rowservice['yn_uid'], "usid" => $rowservice['yn_us_id']);
        array_push($booking, $bookings);
    }

    $data = array("status" => "OK", "message" => "success", "booking" => $booking);
} else {
    $data = array("status" => "KO", "message" => "There was an error, Please try again!");
}
echo json_encode($data);
