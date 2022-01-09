<?php
include_once 'backend/access/connect.php';
session_start();
$sid =  $_SESSION['yn_sid'];
$uid =  $_SESSION['yn_uid'];
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
    echo $value . "==" . $sid;
    if ($value == $sid) {
        $yes = 1;
    }
}
echo $yes;
// if ($yes == 0) {
//     echo $getnotifcation;
// }
