<?php
include "../../backend/access/connect.php";
include "./image_upload.php";

session_start();
//product id for multi image from session
$product_id = $_SESSION['ys_service.yn_sid'];


if (isset($_POST) & !empty($_POST)) {
    // type: cover or multi or remove
    $type = $_POST['type'];

    if ($type == "cover") {
        //cover image
        $cover_img = $_FILES['cover-image'];
        $image_id = $_POST['image-id'];

        if (!empty($cover_img) && isset($cover_img)) {
            $targetdir = "../uploads/";

            $upload_img = imageUpload($targetdir, $cover_img);
            if ($upload_img['status'] == 'success') {
                $queryfDelete = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM ys_service_img WHERE yn_s_imgid='$image_id'"));
                unlink('../../uploads/' . $queryfDelete['yn_s_images']);
                $img_name = $upload_img['output'];

                $image_insert = mysqli_query($connection, "UPDATE `ys_service_img` SET yn_s_images = '$img_name' WHERE yn_s_imgid = '$image_id'");

                $status = "success";
                $msg = "Image Uploaded";
            } else {

                $msg = $upload_img['output'];
                $status = "error";
            }
        }
    } elseif ($type == "multi") {
        //multi image
        $multi_img = $_FILES['multi-image'];

        //multi image upload
        if (!empty($multi_img) && isset($multi_img)) {
            $targetdir = "../../uploads/";

            $upload_img = multiImageUpload($targetdir, $multi_img);

            foreach ($upload_img as $file_name) {
                $image_insert = mysqli_query($connection, "INSERT INTO `ys_service_img`(`yn_s_id`, `yn_s_images`, `yn_s_cover`) VALUES ($product_id,'$file_name',0)");
            }
            $status = "success";
            $msg = "Image Uploaded";
        }
    } elseif ($type == "remove") {
        $image_id = $_POST['imgid'];
        $queryDelete = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM ys_service_img WHERE yn_s_imgid='$image_id'"));
        unlink('../../uploads/' . $queryDelete['yn_s_images']);
        $remove_image = mysqli_query($connection, "DELETE FROM ys_service_img WHERE yn_s_imgid = '$image_id'");
        if ($remove_image) {
            $status = "success";
            $msg = "Image Removed" . mysqli_error($connection);
        }
    }
}

echo json_encode(array('status' => $status, 'message' => $msg));
