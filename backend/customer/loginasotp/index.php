<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

include_once '../../access/connect.php';
$phone = $_POST['phone'];
$data = "";


$OTPGEN = "1357902468";
$OTP = "";
for ($i = 1; $i <= 4; $i++) {
    $OTP .= substr($OTPGEN, (rand() % (strlen($OTPGEN))), 1);
}


//Check if there is OTP registered in Database
$QueryVerifyPhone = mysqli_query($connection, "SELECT * FROM ys_user WHERE yn_phone='$phone'");
$count = mysqli_num_rows($QueryVerifyPhone);

if ($count == 1) {
    $row = mysqli_fetch_assoc($QueryVerifyPhone);
    $verifyuser = $row['yn_phone'];
    if ($verifyuser == $phone) {
        //Send OTP
        $QueryOTP = mysqli_query($connection, "UPDATE ys_user set yn_otp='$OTP' WHERE yn_phone = '$phone'");
        if ($QueryOTP) {
            $data = array("status" => "OK", "mobile" => '+91' . $phone, "otp" => $OTP);
        } else {
            $data = array("status" => "KO", "message" => "There was an error,Please try again!");
        }
    }
} else {
    $data = array("status" => "KO", "message" => "The following credentials are not registered with us, Please Register!");
}
echo json_encode($data);
