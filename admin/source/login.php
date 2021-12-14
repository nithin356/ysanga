<?php
include "../../backend/access/connect.php";
session_start();
$data = 0;

if (isset($_POST['email']) && isset($_POST['pass'])) {

    $email = $_POST['email'];
    $password = md5($_POST['pass']);
    $Query = mysqli_query($connection, "SELECT * FROM ys_admin WHERE yn_email = '$email' OR yn_phone = '$email' AND yn_pass = '$password'");
    $row =  mysqli_fetch_assoc($Query);
    if ($row == true) {
        $dbPassword = $row['yn_pass'];
        $name = $row['yn_name'];
        $emailverify = $row['yn_email'];
        $phone = $row['yn_phone'];
        $id = $row['yn_aid'];
        if ($password == $dbPassword) {
            $_SESSION['yn_aid'] = $id;
            $data = (array('status' => 'success', 'phone' => $phone, 'name' => $name, 'email' => $emailverify, 'sessionid' => $_SESSION['yn_aid']));
        } else {
            $data = (array('status' => 'passwordError', 'message' => 'Your Password is incorrect!'));
        }
    } else {
        $data = (array('status' => 'emailError', 'message' => 'Your email or phone is incorrect!, Check again'));
    }
}
echo json_encode($data);
