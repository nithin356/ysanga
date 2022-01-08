<?php
include_once '../../access/connect.php';
session_start();
$sid =  $_SESSION['yn_sid'];
$date =  $_POST['date'];
$dateQuery = mysqli_query($connection, "SELECT * FROM ys_user_service WHERE yn_sid = '$sid' AND yn_arrival='$date'");
$count = mysqli_num_rows($dateQuery);
if ($count >= 1) {
    $newdatas = array();
    while ($fetch = mysqli_fetch_assoc($dateQuery)) {
        $newdata = array("time" => $fetch['yn_time']);
        array_push($newdatas, $newdata);
    }
    $data = array("status" => "OK", "message" => "success", "slot" => $newdatas);
} else {
    $data = array("status" => "KO", "message" => "There was an error, Please try again!");
}
echo json_encode($data);
