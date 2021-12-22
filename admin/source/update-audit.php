<?php
include "../../backend/access/connect.php";
session_start();
$id = $_SESSION['yn_aid'];
$pid = $_POST['pid'];
$sql = "SELECT * FROM ys_service where yn_sid='$pid' AND yn_a_id = '$id' ";
$result = mysqli_query($connection, $sql);
$count = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);
if ($count == 0) {
    $res = array('status' => 'KO', 'message' => 'No Records Found');
} else {
    $_SESSION['ys_service.yn_sid'] = $pid;
    $get_product_data = array('pid' => $row['yn_sid'], 'prpd' => $pid);
    $res = array('status' => 'OK', 'message' => 'Success', 'data' => $get_product_data);
}
echo json_encode($res);
