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

    //allowing certain file formats
    else if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $msg .= "Only JPG,JPEG & PNG files are allowed";
    } else {
        //check if image is in actual size or fake size
        $check = getimagesize($img_upload['tmp_name']);
        //resolution check
        if ($check !== false && $check[0] >= 100 && $check[1] >= 100) {
            //brought up the whole image upload code here
            if (compressImage($img_upload['tmp_name'], $target_file, 20)) {
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

        //allowing certain file formats
        else if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            $msg .= "Only JPG,JPEG & PNG files are allowed";
        } else {
            //check if image is in actual size or fake size
            $check = getimagesize($img_upload['tmp_name'][$i]);
            //resolution check
            if ($check !== false && $check[0] >= 100 && $check[1] >= 100) {
                //brought up the whole image upload code here
                if (compressImage($img_upload['tmp_name'][$i], $target_file, 20)) {
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

function compressImage($source_url, $destination_url, $quality)
{

    if ($destination_url == NULL || $destination_url == "") $destination_url = $source_url;

    $info = getimagesize($source_url);

    if ($info['mime'] == 'image/jpeg' || $info['mime'] == 'image/jpg') {
        $image = imagecreatefromjpeg($source_url);
        //save file
        //ranges from 0 (worst quality, smaller file) to 100 (best quality, biggest file). The default is the default IJG quality value (about 75).
        imagejpeg($image, $destination_url, $quality);

        //Free up memory
        imagedestroy($image);
    } elseif ($info['mime'] == 'image/png') {
        $image = imagecreatefrompng($source_url);

        imageAlphaBlending($image, true);
        imageSaveAlpha($image, true);

        /* chang to png quality */
        $png_quality = 9 - round(($quality / 100) * 9);
        imagePng($image, $destination_url, $png_quality); //Compression level: from 0 (no compression) to 9(full compression).
        //Free up memory
        imagedestroy($image);
    } else
        return FALSE;

    return $destination_url;
}
