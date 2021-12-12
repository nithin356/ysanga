<?php
include_once '../../access/connect.php';
session_start();
$sid =  $_SESSION['yn_sid'];
$sessionservice = mysqli_query($connection, "SELECT * FROM ys_service WHERE yn_sid='$sid' AND yn_status='1'");
$count = mysqli_num_rows($sessionservice);
if ($count > 0) {
    $array = mysqli_fetch_array($sessionservice);
    $data = array("status" => "OK", "message" => "success", $array);
} else {
    $data = array("status" => "KO", "message" => "There was an error, Please try again!");
}
echo json_encode($data);
