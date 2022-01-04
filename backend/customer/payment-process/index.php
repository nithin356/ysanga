<?php
include_once '../../access/connect.php';
session_start();
$uid =  $_SESSION['yn_uid'];
$amount = $_POST['totalAmount'];
$sid = $_POST['service_id'];
$usid = $_POST['user_service_id'];
$rpid = $_POST['razorpay_payment_id'];
$arr = 0;
require('../../../razorpay-php/Razorpay.php');
$keyId = 'rzp_live_8ckloI2TLnpVvt';
$keySecret = 'iQJlXiTthgwnUidHTsTGDXoS';

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);
$count = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM ys_user_service WHERE yn_us_id='$usid' AND yn_s_price='$amount'"));
if ($count == 1) {
    $update = mysqli_query($connection, "UPDATE ys_user_service SET yn_s_status='2' WHERE yn_us_id='$usid' AND yn_sid='$sid' AND yn_uid='$uid'");
    if ($update) {
        $insert = mysqli_query($connection, "INSERT INTO ys_razorpay_trans (yn_rp_tid,yn_rp_sid,yn_rp_usid)VALUES('$rpid','$sid','$usid')");
        $amount = $amount * 100;
        $api->payment->fetch($rpid)->capture(array('amount' => $amount, 'currency' => 'INR'));
        $arr = array('msg' => 'Payment successfully credited', 'status' => "OK");
    } else {
        $arr = array('msg' => 'There was an error, Please try again , If Payment is debited contact our support' . mysqli_error($connection), 'status' => "KO");
    }
} else {
    $arr = array('msg' => 'There was an error, Please try again , If Payment is debited contact our support', 'status' => "KO");
}
echo json_encode($arr);
