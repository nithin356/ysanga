<?php
include "../../backend/access/connect.php";
$data = 0;
session_start();
$id = $_SESSION['yn_aid'];
$pid = $_POST['pid'];
$sql = "SELECT * FROM ys_service where yn_sid='$pid' AND yn_a_id='$id'";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);
$count = mysqli_num_rows($result);
if ($count < 0) {
    $res = array('status' => 'KO', 'message' => 'No Product Found');
} else {
    $sql1 = "DELETE FROM ys_service WHERE yn_sid='$pid' AND yn_a_id='$id'";
    $result1 = mysqli_query($connection, $sql1);
    if ($result1) {
        $queryDelete = mysqli_query($connection, "SELECT * FROM ys_service_img WHERE yn_s_id='$pid'");
        while ($rowd = mysqli_fetch_assoc($queryDelete)) {
            unlink('../../uploads/' . $rowd['yn_s_images']);
        }
        $sql2 = "DELETE FROM ys_service_img WHERE yn_s_id='$pid'";
        $result3 = mysqli_query($connection, $sql2);

        $res = array('status' => 'OK', 'message' => 'Your Data deleted!');
    } else {
        $res = array('status' => 'KO', 'message' => 'There was an issue updating');
    }
}
echo json_encode($res);
