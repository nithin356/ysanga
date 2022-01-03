<?php
include_once '../../access/connect.php';
session_start();
$usid = $_POST['usid'];
$status = $_POST['cancel'];
if ($status == 1) {
    $sessionservice = mysqli_query($connection, "SELECT * FROM ys_user_service WHERE yn_us_id='$usid'");
    $count = mysqli_num_rows($sessionservice);
    if ($count > 0) {
        $row = mysqli_fetch_assoc($sessionservice);
        $usid = $row['yn_us_id'];
        $update = mysqli_query($connection, "UPDATE ys_user_service SET yn_s_status=3 WHERE yn_us_id='$usid'");
        if ($update) {
            $data = array("status" => "OK", "message" => "success");
        } else {
            $data = array("status" => "KO", "message" => "There was an error, Please try again!");
        }
    } else {
        $data = array("status" => "KO", "message" => "There was an error, Please try again!");
    }
} else {
    $sessionservice = mysqli_query($connection, "SELECT * FROM ys_user_service WHERE yn_us_id='$usid'");
    $count = mysqli_num_rows($sessionservice);
    if ($count > 0) {
        $row = mysqli_fetch_assoc($sessionservice);
        $usid = $row['yn_us_id'];
        $_SESSION['yn_us_id'] = $usid;
        $data = array("status" => "OK", "message" => "success");
    } else {
        $data = array("status" => "KO", "message" => "There was an error, Please try again!");
    }
}
echo json_encode($data);
