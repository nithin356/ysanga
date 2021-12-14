<?php
include "../../backend/access/connect.php";
session_start();
$data = 0;
$id = $_SESSION['yn_aid'];
$sql = "SELECT * FROM ys_admin where yn_aid=$id";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['yn_name'];
$phone = $row['yn_phone'];
$email = $row['yn_email'];
$password = $row['yn_pass'];
$count = mysqli_num_rows($result);
if ($count == 0) {
	$data = array('status' => 'error', 'message' => 'No Records Found');
} else {
	$jdata = array('name' => $name, 'phone' => $phone, 'email' => $email);
	$res = array('status' => 'success', 'message' => 'Success', 'data' => $jdata);
}
echo json_encode($res);
