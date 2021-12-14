<?php
include "../../backend/access/connect.php";
$data = 0;
if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['company'])) {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = md5($_POST['pass']);
    $company = $_POST['company'];
    $created = date("Y-m-d H:i:s");

    $checkEmail = mysqli_query($connection, "SELECT * FROM ys_admin WHERE yn_email = '$email'");
    $checkPhone = mysqli_query($connection, "SELECT * FROM ys_admin WHERE yn_phone = '$phone'");

    if (mysqli_num_rows($checkEmail) > 0) {
        $data = (array('status' => 'error', 'message' => 'Sorry this email is already taken'));
    } else if (mysqli_num_rows($checkPhone) > 0) {
        $data = (array('status' => 'errorphone', 'message' => 'Sorry this Phone is already taken'));
    } else {
        $Query = mysqli_query($connection, "INSERT INTO ys_admin (yn_name, yn_email, yn_phone, yn_pass, yn_company, yn_createdate) VALUES ('$name', '$email', '$phone', '$password', '$company', '$created')");
        if ($Query) {
            $data = (array('status' => 'success', 'message' => 'Your account has been created successfully'));
        } else {
            $data = (array('status' => 'error', 'message' => 'There is an issue while registering'));
        }
    }
}
echo json_encode($data);
