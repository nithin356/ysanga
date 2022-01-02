<?php
include "../../backend/access/connect.php";
session_start();
$pid = 15;
$sql = "SELECT * FROM ys_user_service where yn_sid='$pid'";
$result = mysqli_query($connection, $sql);
$count = mysqli_num_rows($result);
if ($count == 0) {
    $res = array('status' => 'KO', 'message' => 'No Records Found');
} else {
    $newDate="";
    while ($date = mysqli_fetch_assoc($result)) {
        $oldDate = $date['yn_arrival'];
        $arr = explode('/', $oldDate);
        $one = ltrim($arr[1], 0);
        $two = ltrim($arr[0], 0);
        $newDate .= "$one-$two-$arr[2],";
    }
    $res = substr($newDate, 0, -1);
}
echo json_encode($res);
