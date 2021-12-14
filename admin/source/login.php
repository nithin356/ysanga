<?php
include "../../access/connect.php";
session_start();
$data = 0;

if (isset($_POST['email']) && isset($_POST['pass'])) {

    $email = trim($_POST['email']);
    $password = md5($_POST['pass']);
    $Query = mysqli_query($connection, "SELECT * FROM ec_adminsignup WHERE ec_ad_email = '$email' OR ec_ad_phone = '$email' AND ec_ad_password = '$password'");
    $row =  mysqli_fetch_assoc($Query);
    if ($row == true) {
        $dbPassword = $row['ec_ad_password'];
        $name = $row['ec_ad_name'];
        $emailverify = $row['ec_ad_email'];
        $phone = $row['ec_ad_phone'];
        $id = $row['ec_ad_id'];
        if ($password == $dbPassword) {
            $_SESSION['ec_ad_id'] = $id;
            $_SESSION['ec_ad_name'] = $name;
            $data = (array('status' => 'success', 'phone' => $phone, 'name' => $name, 'email' => $emailverify,'sessionid' => $_SESSION['ec_ad_id']));
        } else {
            $data = (array('status' => 'passwordError', 'message' => 'Your Password is incorrect!'));
        }
    } else {
        $data = (array('status' => 'emailError', 'message' => 'Your email or phone is incorrect!, Check again'));
    }
}
echo json_encode($data);
