<?php
include_once '../../access/connect.php';
session_start();
$sid =  $_SESSION['yn_sid'];
$uid =  $_SESSION['yn_uid'];
$review =  $_POST['review'];
$star =  $_POST['star'];
date_default_timezone_set('Asia/Kolkata');

$created = date("Y-m-d H:i:s");
$insert =  mysqli_query($connection, "INSERT INTO ys_review (yn_review, yn_stars, yn_uid, yn_sid, yn_reviewdate) VALUES ('$review', '$star', '$uid', '$sid', '$created')");
if (!$insert) {
    $data = array('status' => 'KO', 'message' => 'There was an error, Please try again!');
} else {
    $data = array("status" => "OK", "message" => "success");
}
echo json_encode($data);
