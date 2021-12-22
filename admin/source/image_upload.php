<?php

function imageUpload($target_dir, $img_upload)
{
    $img_files = $img_upload['name'];
    $status = "error";
    $msg = "";

    $target_file = $target_dir . basename($img_files);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $ext = explode('.', basename($img_files));
    //change file name (generating custom name)
    $new_file_name = md5(uniqid()) . "." . $ext[count($ext) - 1];
    $target_file = $target_dir . $new_file_name;

    //check if file already exists
    if (file_exists($target_file)) {
        $msg .= "file already exists, ";
    }
    //check file size
    else if ($img_files > 10000000000000) {
        $msg .= "Image size is more then 10Mb, please upload smaller size image $img_files";
    }

    //allowing certain file formats
    else if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $msg .= "Only JPG,JPEG & PNG files are allowed";
    } else {
        //check if image is in actual size or fake size
        $check = getimagesize($img_upload['tmp_name']);
        //resolution check
        if ($check !== false && $check[0] >= 100 && $check[1] >= 100) {
            //brought up the whole image upload code here
            if (move_uploaded_file($img_upload['tmp_name'], $target_file)) {
                $status = "success";
                $msg .= $new_file_name;
            } else {
                $msg .= "Sorry,there was an error in uploading your file.";
            }
        } else {
            $msg .= "Image should have a resolution of 100x100 or file uploaded is not an image.";
        }
    }

    $response = array(
        'status' => $status,
        'output' => $msg
    );

    return ($response);
}

function multiImageUpload($target_dir, $img_upload)
{
    $img_files = $img_upload['name'];
    $msg = "";
    $all_fnames = array();
    for ($i = 0; $i < count($img_files); $i++) {
        
        $target_file = $target_dir . basename($img_files[$i]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $ext = explode('.', basename($img_files[$i]));
        //change file name (generating custom name)
        $new_file_name = md5(uniqid()) . "." . $ext[count($ext) - 1];
        $target_file = $target_dir . $new_file_name;

        //check if file already exists
        if (file_exists($target_file)) {
            $msg .= "file already exists, ";
        }
        //check file size
        else if ($img_files[$i] > 10000000000000) {
            $msg .= "Image size is more then 10Mb, please upload smaller size image  $img_files";
        }

        //allowing certain file formats
        else if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            $msg .= "Only JPG,JPEG & PNG files are allowed";
        } else {
            //check if image is in actual size or fake size
            $check = getimagesize($img_upload['tmp_name'][$i]);
            //resolution check
            if ($check !== false && $check[0] >= 100 && $check[1] >= 100) {
                //brought up the whole image upload code here
                if (move_uploaded_file($img_upload['tmp_name'][$i], $target_file)) {
                    array_push($all_fnames, $new_file_name);
                } else {
                    $msg .= "Sorry,there was an error in uploading your file.";
                }
            } else {
                $msg .= "Image should have a resolution of 100x100 or file uploaded is not an image.";
            }
        }
    }
    return ($all_fnames);
}
