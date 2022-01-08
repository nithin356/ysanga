<?php
// require('razorpay-php/Razorpay.php');
// $keyId = 'rzp_live_8ckloI2TLnpVvt';
// $keySecret = 'iQJlXiTthgwnUidHTsTGDXoS';
// use Razorpay\Api\Api;
// $api = new Api($keyId, $keySecret);
// $rpid = 'pay_Ifgc9DQTLfrlzr';
// $amount = 1*100;
// $response = $api->payment->fetch($rpid)->capture(array('amount'=>$amount,'currency' => 'INR'));
// echo json_encode($response);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://sms.dewdropds.com/sendsms/sendsms.php?username=ddysanga&password=tech321&type=TEXT&sender=%20YSANGA&mobile=9483887537&message=%20Your%20OTP%20to%20Login%20for%20YuvakaSangha%20Facility%20booking%20is%201234.%20Valid%20for%205%20minutes.&PEID=1501640110000034974&HeaderId=1505164102607446927&templateId=%201507164140126743578");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);
