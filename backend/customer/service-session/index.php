<?php
include_once '../../access/connect.php';
session_start();
$sid = $_POST['sid'];
$sessionservice = mysqli_query($connection, "SELECT * FROM ys_service WHERE yn_sid='$sid'");
$count = mysqli_num_rows($sessionservice);
if ($count > 0) {
    $row = mysqli_fetch_assoc($sessionservice);
    $sid = $row['yn_sid'];
    $_SESSION['yn_sid'] = $sid;
    $data = array("status" => "OK", "message" => "success");
} else {
    $data = array("status" => "KO", "message" => "There was an error, Please try again!");
}
echo json_encode($data);
