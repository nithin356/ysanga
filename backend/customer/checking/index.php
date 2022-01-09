<?php
include_once '../../access/connect.php';
session_start();
$sid =  $_SESSION['yn_sid'];
$uid =  $_SESSION['yn_uid'];
if (isset($_POST['arrival'])) {
    $arrival =  $_POST['arrival'];
    $timeSlot =  $_POST['timeSlot'];
    $toe =  $_POST['toe'];
    $noa =  $_POST['noa'];
    $checked =  $_POST['checked'];
    $others =  $_POST['others'];
    date_default_timezone_set('Asia/Kolkata');
    $created = date("Y-m-d H:i:s");
    $fromSession = $_POST['edit'];
    $status = 0;
    if ($fromSession == 1) {
        $usid =  $_SESSION['yn_us_id'];
        $update =  mysqli_query($connection, "UPDATE ys_user_service SET yn_arrival='$arrival', yn_organisation='$noa', yn_time='$timeSlot', yn_eventtype='$toe', yn_other='$others'  WHERE yn_us_id='$usid'");
        if ($checked == 1) {
            $getnQuery = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM ys_user WHERE yn_uid='$uid'"));
            $getnotifcation = $getnQuery['yn_notification'];
            if ($getnotifcation == "" || $getnotifcation == null) {
                $getnotifcation = $sid . ',';
            } else {
                $getnotifcation = $getnQuery['yn_notification'] . $sid . ',';
            }
            $yes = 0;
            $string = preg_replace('/\.$/', '', $getnotifcation); //Remove dot at end if exists
            $array = explode(',', $string); //split string into array seperated by ', '
            foreach ($array as $value) //loop over values
            {
                if ($value == $sid) {
                    $yes = 1;
                }
            }
            if ($yes == 0) {
                $updated = mysqli_query($connection, "UPDATE ys_user SET yn_notification='$getnotifcation' WHERE yn_uid='$uid'");
            }
        }
        if (!$update) {
            $data = (array('status' => 'KO', 'message' => 'There was an error, Please try again!'));
        } else {
            $data = array("status" => "OK", "message" => "success");
        }
    } else {
        $disprice = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM ys_service WHERE yn_sid='$sid'"));
        $price = $disprice['yn_price'];
        $insert =  mysqli_query($connection, "INSERT INTO ys_user_service (yn_arrival, yn_organisation, yn_time, yn_eventtype, yn_other, yn_created, yn_sid, yn_uid, yn_s_status, yn_s_price) VALUES ('$arrival', '$noa', '$timeSlot','$toe', '$others', '$created', '$sid', '$uid', '$status', '$price')");
        if ($checked == 1) {
            $getnQuery = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM ys_user WHERE yn_uid='$uid'"));
            $getnotifcation = $getnQuery['yn_notification'];
            if ($getnotifcation == "" || $getnotifcation == null) {
                $getnotifcation = $sid . ',';
            } else {
                $getnotifcation = $getnQuery['yn_notification'] . $sid . ',';
            }
            $yes = 0;
            $string = preg_replace('/\.$/', '', $getnotifcation); //Remove dot at end if exists
            $array = explode(', ', $string); //split string into array seperated by ', '
            foreach ($array as $value) //loop over values
            {
                if ($value == $sid) {
                    $yes = 1;
                }
            }
            if ($yes == 0) {
                $updated = mysqli_query($connection, "UPDATE ys_user SET yn_notification='$getnotifcation' WHERE yn_uid='$uid'");
            }
        }
        if (!$insert) {
            $data = (array('status' => 'KO', 'message' => 'There was an error, Please try again!'));
        } else {
            $data = array("status" => "OK", "message" => "success");
        }
    }
} else {
    $data = (array('status' => 'KO', 'message' => 'There was an error, Please try again!'));
}
echo json_encode($data);
