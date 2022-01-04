<?php
require('razorpay-php/Razorpay.php');
$keyId = 'rzp_live_8ckloI2TLnpVvt';
$keySecret = 'iQJlXiTthgwnUidHTsTGDXoS';
use Razorpay\Api\Api;
$api = new Api($keyId, $keySecret);
$rpid = 'pay_Ifgc9DQTLfrlzr';
$amount = 1*100;
$response = $api->payment->fetch($rpid)->capture(array('amount'=>$amount,'currency' => 'INR'));
echo json_encode($response);