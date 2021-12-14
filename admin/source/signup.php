<?php
include "../../access/connect.php";
$data = 0;
if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['pass'])) {


    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = md5($_POST['pass']);

    $checkEmail = mysqli_query($connection, "SELECT * FROM ec_adminsignup WHERE ec_ad_email = '$email'");
    $checkPhone = mysqli_query($connection, "SELECT * FROM ec_adminsignup WHERE ec_ad_phone = '$phone'");

    if (mysqli_num_rows($checkEmail) > 0) {
        $data = (array('status' => 'error', 'message' => 'Sorry this email is already taken'));
    } else if (mysqli_num_rows($checkPhone) > 0) {
        $data = (array('status' => 'errorphone', 'message' => 'Sorry this Phone is already taken'));
    } else {
        $Query = mysqli_query($connection, "INSERT INTO ec_adminsignup (ec_ad_name, ec_ad_email, ec_ad_phone, ec_ad_password) VALUES ('$name', '$email', '$phone', '$password')");
        if ($Query) {
            $data = (array('status' => 'success', 'message' => 'Your account has been created successfully'));
        } else {
            $data = (array('status' => 'error', 'message' => 'There is an issue while registering'));
        }
    }
}
echo json_encode($data);