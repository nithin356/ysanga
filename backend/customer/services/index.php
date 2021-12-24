<?php
include_once '../../access/connect.php';
$sessionservice = mysqli_query($connection, "SELECT * FROM ys_service JOIN ys_service_img on ys_service.yn_sid=ys_service_img.yn_s_id WHERE yn_status='1' AND yn_s_cover='1'");

$count = mysqli_num_rows($sessionservice);
if ($count > 0) {
    $service = array();
    while ($rowservice = mysqli_fetch_assoc($sessionservice)) {
        $services = array("sid" => $rowservice['yn_sid'], "sname" => $rowservice['yn_sname'], "sdesc" => $rowservice['yn_sdesc'], "ldesc" => $rowservice['yn_ldesc'], "img" => $rowservice['yn_s_images'], "price" => $rowservice['yn_price'], "capacity" => $rowservice['yn_capacity'], "img" => $rowservice['yn_s_images'], "specs" => $rowservice['yn_specs']);
        array_push($service, $services);
    }

    $data = array("status" => "OK", "message" => "success", "service" => $service);
} else {
    $data = array("status" => "KO", "message" => "There was an error, Please try again!");
}
echo json_encode($data);
