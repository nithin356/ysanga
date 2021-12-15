<?php
include "../../backend/access/connect.php";
include "./image_upload.php";
session_start();
// $id = 2;
$id = $_SESSION['yn_aid'];
$data = 0;
$name = trim($_POST['name']);
$sdesc = trim($_POST['sdesc']);
$ldesc = trim($_POST['ldesc']);
$cover_img = $_FILES['cover-image'];
$multi_img = $_FILES['multi-image'];
$Query = mysqli_query($connection, "INSERT INTO ys_service (yn_sname, yn_sdesc, yn_ldesc, yn_status, yn_a_id) VALUES ('$name', '$sdesc', '$ldesc', '1', '$id')");
if ($Query) {
    $auditid = mysqli_insert_id($connection);
    if (!empty($cover_img) && isset($cover_img)) {
        $targetdir = "../../uploads/";

        $upload_img = imageUpload($targetdir, $cover_img);
        if ($upload_img['status'] == 'success') {
            $img_name = $upload_img['output'];
            $image_insert = mysqli_query($connection, "INSERT INTO `ys_service_img`(`yn_s_id`, `yn_s_images`, `yn_s_cover`) VALUES ($auditid,'$img_name',1)");
        } else {
            $emsg = $upload_img['output'];
        }
    }
    if (!empty($multi_img) && isset($multi_img)) {
        $targetdir = "../../uploads/";
        $upload_img = multiImageUpload($targetdir, $multi_img);

        foreach ($upload_img as $file_name) {
            $image_insert = mysqli_query($connection, "INSERT INTO `ys_service_img`(`yn_s_id`, `yn_s_images`, `yn_s_cover`) VALUES ($auditid,'$file_name',0)");
        }
    }
    $data = (array('status' => 'success', 'message' => 'Your data has been created successfully'));
} else {
    $data = (array('status' => 'error', 'message' => 'There is an issue while registering'));
}
echo json_encode($data);
