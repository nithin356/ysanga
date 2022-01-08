<?php
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
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "http://sms.dewdropds.com/sendsms/sendsms.php?username=ddysanga&password=tech321&type=TEXT&sender=%20YSANGA&mobile=$phone&message=%20Your%20OTP%20to%20Login%20for%20YuvakaSangha%20Facility%20booking%20is%20$OTP.%20Valid%20for%205%20minutes.&PEID=1501640110000034974&HeaderId=1505164102607446927&templateId=%201507164140126743578");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec($ch);
            curl_close($ch);
        } else {
            $data = array("status" => "KO", "message" => "There was an error,Please try again!");
        }
    }
} else {
    $data = array("status" => "KO", "message" => "The following credentials are not registered with us, Please Register!");
}
echo json_encode($data);
