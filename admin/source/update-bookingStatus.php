<?php
include "../../backend/access/connect.php";
session_start();
$pid = $_POST['pid'];
$sid = $_POST['sid'];
$sql = "SELECT * FROM ys_user_service WHERE yn_us_id = '$sid'";
$result = mysqli_query($connection, $sql);
$count = mysqli_num_rows($result);
if ($count == 0) {
    $res = array('status' => 'KO', 'message' => 'No Records Found');
} else {
    $sql1 = "UPDATE ys_user_service SET  yn_s_status = '$pid' WHERE yn_us_id = '$sid'";
    $result1 = mysqli_query($connection, $sql1);
    if ($result1) {
        $res = array('status' => 'OK', 'message' => 'Your Data Updated Successfully!');
    } else {
        $res = array('status' => 'KO', 'message' => 'Product Not Updated');
    }
}
echo json_encode($res);
