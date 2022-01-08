<?php
include "../../backend/access/connect.php";
session_start();
$id = $_SESSION['yn_aid'];
$sessionservice = mysqli_query($connection, "SELECT * FROM ys_user_service JOIN ys_service_img on ys_user_service.yn_sid=ys_service_img.yn_s_id JOIN ys_service ON ys_user_service.yn_sid=ys_service.yn_sid WHERE yn_s_cover='1' AND yn_a_id='$id'");
$count = mysqli_num_rows($sessionservice);
if ($count > 0) {
    $service = array();
    while ($rowservice = mysqli_fetch_assoc($sessionservice)) {
        $usid = $rowservice['yn_uid'];
        $row = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM ys_user WHERE yn_uid='$usid'"));
        $usname = $row['yn_name'];
        $phone = $row['yn_phone'];
        $email = $row['yn_email'];
        $status = $rowservice['yn_s_status'];
        if ($status == 0) {
            $status = "New";
        } else if ($status == 1) {
            $status = "Approved!";
        } else if ($status == 2) {
            $status = "Completed!";
        }
        $timeslot = $rowservice['yn_time'];
        if ($timeslot === "1") {
            $timeslot = "9:00 AM - 2:30 PM";
        } else if ($timeslot === "2") {
            $timeslot = "3:00 PM - 9:00 PM";
        } else if ($timeslot === "3") {
            $timeslot = "9:00 AM - 9:00 PM";
        }
        $eventtype = $rowservice['yn_eventtype'];
        $userserid = $rowservice['yn_us_id'];
        $getPayMentCount = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM ys_razorpay_trans WHERE yn_rp_usid='$userserid'"));
        $payment = "";
        if ($getPayMentCount > 0) {
            $payment = "Success";
        } else {
            $payment = "Not Processed";
        }
        $services = array("sid" => $rowservice['yn_us_id'], "status" => $status, "statusno" => $rowservice['yn_s_status'], "timeslot" => $timeslot, "eventtype" => $eventtype, "img" => $rowservice['yn_s_images'], "arrival" => $rowservice['yn_arrival'], "org" => $rowservice['yn_organisation'], "other" => $rowservice['yn_other'], "created" => $rowservice['yn_created'], "name" => $rowservice['yn_sname'], "username" => $usname, "phone" => $phone, "email" => $email, "payment" => $payment);
        array_push($service, $services);
    }

    $data = array("status" => "OK", "message" => "success", "booking" => $service);
} else {
    $data = array("status" => "KO", "message" => "There was an error, Please try again!");
}
echo json_encode($data);
