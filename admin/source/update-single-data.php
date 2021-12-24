<?php
include "../../backend/access/connect.php";
$data = 0;
session_start();
$id = $_SESSION['ys_service.yn_sid'];
$ids = $_SESSION['yn_aid'];
$res = 0;

if (isset($_POST) & !empty($_POST)) {
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $sdes = mysqli_real_escape_string($connection, $_POST['sdes']);
    $bdes = mysqli_real_escape_string($connection, $_POST['bdes']);
    $price = mysqli_real_escape_string($connection, $_POST['price']);
    $status = mysqli_real_escape_string($connection, $_POST['status']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $capacity = mysqli_real_escape_string($connection, $_POST['capacity']);
    $specs = mysqli_real_escape_string($connection, $_POST['specifications']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);

    $sql1 = "UPDATE ys_service SET yn_sname = '$name', yn_sdesc = '$sdes', yn_ldesc = '$bdes', yn_price = '$price', yn_status = '$status', yn_capacity = '$capacity', yn_phone = '$phone', yn_specs = '$specs', yn_address = '$address' WHERE yn_a_id = '$ids' AND yn_sid= '$id'";
    $result1 = mysqli_query($connection, $sql1);
    if ($result1) {
        $res = array('status' => 'OK', 'message' => 'Your Data Updated Successfully!');
    } else {
        $res = array('status' => 'KO', 'message' => 'Product Not Updated');
    }
}
echo json_encode($res);
