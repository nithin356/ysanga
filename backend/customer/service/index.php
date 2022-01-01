<?php
include_once '../../access/connect.php';
session_start();
$sid =  $_SESSION['yn_sid'];
$sessionservice = mysqli_query($connection, "SELECT * FROM ys_service JOIN ys_service_img on ys_service.yn_sid=ys_service_img.yn_s_id WHERE yn_sid='$sid' AND yn_status='1' AND yn_s_cover='1'");
$review = mysqli_query($connection, "SELECT * FROM ys_review WHERE yn_sid='$sid'");

$reviewfive = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM ys_review WHERE yn_sid='$sid' AND yn_stars='5'"));
$reviewfour = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM ys_review WHERE yn_sid='$sid' AND yn_stars='4'"));
$reviewthree = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM ys_review WHERE yn_sid='$sid' AND yn_stars='3'"));
$reviewtwo = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM ys_review WHERE yn_sid='$sid' AND yn_stars='2'"));
$reviewone = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM ys_review WHERE yn_sid='$sid' AND yn_stars='1'"));
$myReviewAudit = (5 * $reviewfive + 4 * $reviewfour + 3 * $reviewthree + 2 * $reviewtwo + 1 * $reviewone) / ($reviewfive + $reviewfour + $reviewthree + $reviewtwo + $reviewone);

$count = mysqli_num_rows($sessionservice);
$countreview = mysqli_num_rows($review);
if ($count > 0) {
    $rowservice = mysqli_fetch_assoc($sessionservice);
    $otherimages = mysqli_query($connection, "SELECT * FROM ys_service_img WHERE yn_s_id='$sid'");
    $imgarray = array();
    while ($img = mysqli_fetch_assoc($otherimages)) {
        $oimg = array("oimg" => $img['yn_s_images']);
        array_push($imgarray, $oimg);
    }
    $reviewArr = array();
    while ($Rrow = mysqli_fetch_assoc($review)) {
        $uid = $Rrow['yn_uid'];
        $getuname =  mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM ys_user WHERE yn_uid = '$uid'"));
        $reviewData = array("review" => $Rrow['yn_review'], "stars" => $Rrow['yn_stars'], "uname" => $getuname['yn_name'], "date" => $Rrow['yn_reviewdate']);
        array_push($reviewArr, $reviewData);
    }
    $service = array("sid" => $rowservice['yn_sid'], "sname" => $rowservice['yn_sname'], "sdesc" => $rowservice['yn_sdesc'], "ldesc" => $rowservice['yn_ldesc'], "cimg" => $rowservice['yn_s_images'], "phone" => $rowservice['yn_phone'], "price" => $rowservice['yn_price'], "capacity" => $rowservice['yn_capacity'], "specs" => $rowservice['yn_specs'], "addr" => $rowservice['yn_address'], "img" => $imgarray, "review" => $reviewArr, "creview" => $countreview, "resultReview" => number_format($myReviewAudit, 1));
    $data = array("status" => "OK", "message" => "success", "service" => $service);
} else {
    $data = array("status" => "KO", "message" => "There was an error, Please try again!");
}
echo json_encode($data);
