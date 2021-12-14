<?php
include "../../backend/access/connect.php";
$data = 0;
$id = $_SESSION['ec_ad_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$oldpass = md5($_POST['oldpass']);
$newpass = md5($_POST['newpass']);

$sql = "SELECT ec_ad_password FROM ec_adminsignup where ec_ad_id=$id";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);
$password = $row['ec_ad_password'];
if ($password != $oldpass) {
	$res = array('status' => 'error', 'message' => 'old password does not match');
} else if ($newpass == $oldpass) {
	$res = array('status' => 'error', 'message' => 'Password cannot be same as old Password');
} else {
	$sql1 = "UPDATE ec_adminsignup SET ec_ad_name='$name', ec_ad_phone='$phone', ec_ad_email='$email', ec_ad_password='$newpass' WHERE ec_ad_id= '$id'";
	$result1 = mysqli_query($connection, $sql1);
	if ($result1) {
		$res = array('status' => 'success', 'message' => 'Profile Updated');
	} else {
		$res = array('status' => 'error', 'message' => 'Profile Not Updated');
	}
}
echo json_encode($res);
