<?php
include "../../backend/access/connect.php";
$product = mysqli_query($connection, "SELECT * FROM ec_product");
$pcount = mysqli_num_rows($product);
$payment = mysqli_query($connection, "SELECT * FROM ec_payment_track");
$paymentc = mysqli_num_rows($payment);
$vendor = mysqli_query($connection, "SELECT * FROM ec_vendor");
$vendorc = mysqli_num_rows($vendor);
$vendorhold = mysqli_query($connection, "SELECT * FROM ec_vendor WHERE ec_vn_accstatus='0'");
$vendorch = mysqli_num_rows($vendorhold);
$res = mysqli_query($connection, "SELECT * FROM ec_reseller");
$resc = mysqli_num_rows($res);
$reshold = mysqli_query($connection, "SELECT * FROM ec_reseller WHERE ec_rs_accstatus='0'");
$resch = mysqli_num_rows($reshold);
$data = array("status" => 'success', "pcount" => $pcount, "vendor" => $vendorc, "vendoroh" => $vendorch, "reseller" => $resc, "roh" => $resch, "payment" => $paymentc);
echo json_encode($data);
