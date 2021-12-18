<?php
include_once '../../access/connect.php';
session_start();
$sid =  $_SESSION['yn_sid'];
$sessionservice = mysqli_query($connection, "SELECT * FROM ys_service JOIN ys_service_img on ys_service.yn_sid=ys_service_img.yn_s_id WHERE yn_sid='$sid' AND yn_status='1' AND yn_s_cover='1'");

$count = mysqli_num_rows($sessionservice);
if ($count > 0) {
    $rowservice = mysqli_fetch_assoc($sessionservice);
    $otherimages = mysqli_query($connection, "SELECT * FROM ys_service_img WHERE yn_s_id='$sid'");
    $imgarray = array();
    while ($img = mysqli_fetch_assoc($otherimages)) {
        $oimg = array("oimg" => $img['yn_s_images']);
        array_push($imgarray, $oimg);
    }
    $service = array("sid" => $rowservice['yn_sid'], "sname" => $rowservice['yn_sname'], "sdesc" => $rowservice['yn_sdesc'], "ldesc" => $rowservice['yn_ldesc'], "cimg" => $rowservice['yn_s_images'], "img" => $imgarray);
    $data = array("status" => "OK", "message" => "success", "service" => $service);
} else {
    $data = array("status" => "KO", "message" => "There was an error, Please try again!");
}
echo json_encode($data);
