<?php
include "../../backend/access/connect.php";
$data = 0;
$id = $_SESSION['yn_aid'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$oldpass = md5($_POST['oldpass']);
$newpass = md5($_POST['newpass']);

$sql = "SELECT yn_pass FROM ys_admin where yn_aid=$id";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);
$password = $row['yn_pass'];
if ($password != $oldpass) {
	$res = array('status' => 'error', 'message' => 'old password does not match');
} else if ($newpass == $oldpass) {
	$res = array('status' => 'error', 'message' => 'Password cannot be same as old Password');
} else {
	$sql1 = "UPDATE ys_admin SET yn_name='$name', yn_phone='$phone', yn_email='$email', yn_pass='$newpass' WHERE yn_aid= '$id'";
	$result1 = mysqli_query($connection, $sql1);
	if ($result1) {
		$res = array('status' => 'success', 'message' => 'Profile Updated');
	} else {
		$res = array('status' => 'error', 'message' => 'Profile Not Updated');
	}
}
echo json_encode($res);
