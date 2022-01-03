<?php
include "../../backend/access/connect.php";
require('../../razorpay-php/Razorpay.php');
$keyId = 'rzp_live_8ckloI2TLnpVvt';
$keySecret = 'iQJlXiTthgwnUidHTsTGDXoS';
session_start();
$id = $_SESSION['yn_aid'];

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);
$query = mysqli_query($connection, "SELECT * FROM ys_razorpay_trans JOIN ys_service ON ys_service.yn_sid=ys_razorpay_trans.yn_rp_sid WHERE yn_a_id=$id");
$count = mysqli_num_rows($query);
if ($count > 0) {
    $service = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $paymentId = $row['yn_rp_tid'];
        $usid = $row['yn_rp_usid'];
        $getuserDetail = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM ys_user_service JOIN ys_user ON ys_user_service.yn_uid=ys_user.yn_uid WHERE yn_us_id=$usid"));
        $response = $api->payment->fetch($paymentId);
        $status = $response->status;
        $created = $response->created_at;
        $amount = $response->amount;
        $email = $response->email;
        $services = array("rp_id" => $paymentId, "status" => $status, "created_at" => $created, "amount" => $amount, "email" => $email, "usname" => $getuserDetail['yn_name'], "auditorium" => $row['yn_sname']);
        array_push($service, $services);
    }
    $data = array("status" => "OK", "message" => "success", "data" => $service);
} else {
    $data = array("status" => "KO", "message" => "There was an error, Please try again!");
}
echo json_encode($data);