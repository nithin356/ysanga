<?php
include "../../backend/access/connect.php";
session_start();
$data = 0;
$id = $_SESSION['yn_aid'];
$booking = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM ys_user_service JOIN ys_service ON ys_service.yn_sid=ys_user_service.yn_sid"));
$pbook = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM ys_user_service JOIN ys_service ON ys_service.yn_sid=ys_user_service.yn_sid WHERE yn_s_status=0"));
$obook = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM ys_user_service JOIN ys_service ON ys_service.yn_sid=ys_user_service.yn_sid WHERE yn_s_status=1"));
$cbook = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM ys_user_service JOIN ys_service ON ys_service.yn_sid=ys_user_service.yn_sid WHERE yn_s_status=3"));
$data = array("status" => 'success', "urbooking" => $booking, "pendingbooking" => $pbook, "onbooking" => $obook, "cancelled" => $cbook);
echo json_encode($data);
