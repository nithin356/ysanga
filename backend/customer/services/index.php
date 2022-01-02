<?php
include_once '../../access/connect.php';
$sessionservice = mysqli_query($connection, "SELECT * FROM ys_service JOIN ys_service_img on ys_service.yn_sid=ys_service_img.yn_s_id WHERE yn_status='1' AND yn_s_cover='1'");

$count = mysqli_num_rows($sessionservice);
if ($count > 0) {
    $service = array();
    while ($rowservice = mysqli_fetch_assoc($sessionservice)) {
        $sid = $rowservice['yn_sid'];
        $reviewfive = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM ys_review WHERE yn_sid='$sid' AND yn_stars='5'"));
        $reviewfour = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM ys_review WHERE yn_sid='$sid' AND yn_stars='4'"));
        $reviewthree = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM ys_review WHERE yn_sid='$sid' AND yn_stars='3'"));
        $reviewtwo = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM ys_review WHERE yn_sid='$sid' AND yn_stars='2'"));
        $reviewone = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM ys_review WHERE yn_sid='$sid' AND yn_stars='1'"));
        $myReviewAudit = (5 * $reviewfive + 4 * $reviewfour + 3 * $reviewthree + 2 * $reviewtwo + 1 * $reviewone) / ($reviewfive + $reviewfour + $reviewthree + $reviewtwo + $reviewone);

        $services = array("sid" => $rowservice['yn_sid'], "sname" => $rowservice['yn_sname'], "sdesc" => $rowservice['yn_sdesc'], "ldesc" => $rowservice['yn_ldesc'], "img" => $rowservice['yn_s_images'], "price" => $rowservice['yn_price'], "oprice" => $rowservice['yn_og_price'], "capacity" => $rowservice['yn_capacity'], "img" => $rowservice['yn_s_images'], "specs" => $rowservice['yn_specs'], "fullRation" => ceil($myReviewAudit));
        array_push($service, $services);
    }

    $data = array("status" => "OK", "message" => "success", "service" => $service);
} else {
    $data = array("status" => "KO", "message" => "There was an error, Please try again!");
}
echo json_encode($data);
