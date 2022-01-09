<?php
include_once '../../access/connect.php';
session_start();
$uid =  $_SESSION['yn_uid'];
$edit = $_POST['edit'];
$data = "";

if ($edit == 0) {
    $count = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM ys_user WHERE yn_uid='$uid'"));
    if ($count > 0) {
        $query = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM ys_user WHERE yn_uid='$uid'"));
        $data = array("status" => "OK", "message" => "success", "name" => $query['yn_name'], "phone" => $query['yn_phone'], "email" => $query['yn_email'], "notif" => $query['yn_notification']);
    } else {
        $data = array("status" => "KO", "message" => "There was an error, Please try again!");
    }
} else if ($edit == 2) {
    $name = $_POST['usname'];
    $phone = $_POST['num'];
    $email = $_POST['email'];
    $update = mysqli_query($connection, "UPDATE ys_user SET yn_name='$name', yn_phone='$phone', yn_email='$email' WHERE yn_uid='$uid'");
    if ($update) {
        $data = array("status" => "OK", "message" => "success");
    } else {
        $data = array("status" => "KO", "message" => "Error!" . mysqli_error($connection));
    }
} else if ($edit == 1) {
    $phone = $_POST['newNum'];
    $data = "";


    $OTPGEN = "1357902468";
    $OTP = "";
    for ($i = 1; $i <= 4; $i++) {
        $OTP .= substr($OTPGEN, (rand() % (strlen($OTPGEN))), 1);
    }


    //Check if there is OTP registered in Database
    $QueryVerifyPhone = mysqli_query($connection, "SELECT * FROM ys_user WHERE yn_phone='$phone'");
    $count = mysqli_num_rows($QueryVerifyPhone);

    if ($count == 0) {
        if ($phone !== null || $phone !== null) {
            $queryph = mysqli_query($connection, "SELECT * FROM ys_otp where yn_otp_phone='$phone'");
            $countph = mysqli_num_rows($queryph);
            if ($countph == 1) {
                $QueryuOTP = mysqli_query($connection, "UPDATE ys_otp SET yn_otp_val='$OTP' WHERE  yn_otp_phone='$phone'");
                if ($QueryuOTP) {
                    $data = array("status" => "OK", "otp" => $OTP);
                } else {
                    $data = array("status" => "KO", "message" => "There was an error,Please try again!" . mysqli_error($connection));
                }
            } else {
                $QueryOTP = mysqli_query($connection, "INSERT INTO ys_otp (yn_otp_phone,yn_otp_val)VALUES('$phone','$OTP')");
                if ($QueryOTP) {
                    $data = array("status" => "OK", "otp" => $OTP);
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, "http://sms.dewdropds.com/sendsms/sendsms.php?username=ddysanga&password=tech321&type=TEXT&sender=%20YSANGA&mobile=$phone&message=%20Your%20OTP%20to%20Login%20for%20YuvakaSangha%20Facility%20booking%20is%20$OTP.%20Valid%20for%205%20minutes.&PEID=1501640110000034974&HeaderId=1505164102607446927&templateId=%201507164140126743578");
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    $response = curl_exec($ch);
                    curl_close($ch);
                } else {
                    $data = array("status" => "KO", "message" => "There was an error,Please try again!" . mysqli_error($connection));
                }
            }
        }
    } else {
        $data = array("status" => "KO", "message" => "The Following number or email is already registered with us!");
    }
} else if ($edit == 3) {
    $phone = $_POST['getPhone'];
    $otp = $_POST['otp'];
    $QueryVerify = mysqli_query($connection, "SELECT * FROM ys_otp WHERE yn_otp_phone='$phone'");
    $counts = mysqli_num_rows($QueryVerify);
    if ($counts > 0) {
        $row = mysqli_fetch_assoc($QueryVerify);
        $checkotp = $row['yn_otp_val'];
        if ($otp == $checkotp) {
            $deleteVerifyOTP = mysqli_query($connection, "UPDATE ys_otp set yn_otp_val='' WHERE yn_otp_phone = '$phone'");
            $data = array("status" => "OK", "message" => "success");
        } else {
            $data = array("status" => "KO", "message" => "OTP doesnt Match, Check again!");
        }
    } else {
        $data = array("status" => "KO", "message" => "There was an error, Please try again!");
    }
}
echo json_encode($data);
