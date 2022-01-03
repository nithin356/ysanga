<?php
include_once '../../access/connect.php';
session_start();
$sid =  $_SESSION['yn_sid'];
$dateQuery = mysqli_query($connection, "SELECT * FROM ys_user_service WHERE yn_sid = '$sid'");
$newDate = "";
while ($date = mysqli_fetch_assoc($dateQuery)) {
    $oldDate = $date['yn_arrival'];
    $arr = explode('/', $oldDate);
    $one = ltrim($arr[1], 0);
    $two = ltrim($arr[0], 0);
    $newDate .= "$one-$two-$arr[2],";
}
$res = substr($newDate, 0, -1);
echo json_encode($res);
