<?php
include "../../backend/access/connect.php";
session_start();
$no_product = false;
$id = $_SESSION['yn_aid'];

if (isset($_SESSION['ys_service.yn_sid'])) {
    $pid = $_SESSION['ys_service.yn_sid'];
} else {
    $no_product = false;
    //header("Location: view-product");
}
$check_product = mysqli_query($connection, "SELECT * FROM ys_service where yn_sid='$pid' AND yn_a_id = '$id' ");
if (mysqli_num_rows($check_product) <= 0) {
    $no_product = true;
}
//get product data
$row = mysqli_fetch_assoc($check_product);
$status = $row['yn_status'];
if ($status == 0) {
    $active_status = "In-Active";
} else {
    $active_status = "Active";
}

//get product cover image
$cover_image = mysqli_query($connection, "SELECT * FROM ys_service_img where yn_s_id='$pid' AND yn_s_cover='1'");
$cover_image_data = mysqli_fetch_assoc($cover_image);

//get product multiple images
$mul_image = mysqli_query($connection, "SELECT * FROM ys_service_img where yn_s_id='$pid' AND yn_s_cover='0'");
//$mul_image_data = mysqli_fetch_assoc($mul_image);
$price = $row['yn_price'];
$oprice = $row['yn_og_price'];
if ($no_product) { ?>
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading text-center">
                <br><br>
                <h2 class="panel-title">No Data Found</h2>
                <p class="panel-subtitle">
                    <a href="view-auditorium.php">View auditorium</a>
                </p>
                <br><br>
            </header>
        </section>
    </div>
<?php  } else { ?>
    <div class="col-md-12">
        <!-- <form id="product-form" enctype="multipart/form-data" class="" method="POST"> -->
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Update Auditorium</h2>
                <p class="panel-subtitle">
                    Update your Auditorium details below.
                </p>
            </header>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Auditorium Name <span class="required">*</span></label>
                    <div class="col-sm-10 input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-tag"></i>
                        </span>
                        <input type="text" name="vn_pname" class="form-control vn_pname" placeholder="Enter your Product Name" value="<?php echo $row['yn_sname']; ?>" />
                    </div>
                    <p class="col-sm-offset-2 text-danger-pname text-danger"></p>
                </div>
                <div class="form-group">
                    <label class="col-sm-2">Short Description <span class="required">*</span></label>
                    <div class="col-sm-10 input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-file-text"></i>
                        </span>
                        <input type="text" name="sdescription" class="form-control vn_sdes" placeholder="Short Description of your product" value="<?php echo $row['yn_sdesc']; ?>" />
                    </div>
                    <p class="col-sm-offset-2 text-danger-sdes text-danger"></p>
                </div>
                <div class="form-group">
                    <label class="col-sm-2">Description <span class="required">*</span></label>
                    <div class="col-sm-10 input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-file-text"></i>
                        </span>
                        <textarea type="text" name="vn_bdesc" class="form-control vn_bdes" placeholder="Brief Description"><?php echo $row['yn_ldesc']; ?></textarea>
                    </div>
                    <p class="col-sm-offset-2 text-danger-bdes text-danger"></p>
                </div>
                <div class="form-group">
                    <label class="col-sm-2">Status <span class="required">*</span></label>
                    <div class="col-sm-10 input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-circle-o"></i>
                        </span>
                        <select name="vn_status" id="statuss" class="form-control  vn_status">
                            <?php if ($status == 0) { ?>
                                <option value="0" selected hidden>In-Active</option>
                            <?php } else { ?>
                                <option value="1" selected hidden>Active</option>
                            <?php } ?>
                            <option value="1">Active</option>
                            <option value="0">In-Active</option>

                        </select>
                    </div>
                    <p class="col-sm-offset-2  pull-right text-info">Currently <?php echo $active_status; ?></p>
                    <p class="col-sm-offset-2  text-danger"></p>
                </div>

                <div class="form-group">
                    <label class="col-sm-2">Phone <span class="required">*</span></label>
                    <div class="col-sm-10 input-group">
                        <span class="input-group-addon">
                            ₹ &nbsp;
                        </span>
                        <input type="text" name="vn_phone" class="form-control vn_phone" placeholder="Enter Phone number" value="<?php echo $row['yn_phone']; ?>" />
                    </div>
                    <p class="col-sm-offset-2  text-danger"></p>
                </div>
                <div class="form-group">
                    <label class="col-sm-2">Capacity <span class="required">*</span></label>
                    <div class="col-sm-10 input-group">
                        <span class="input-group-addon">
                            ₹ &nbsp;
                        </span>
                        <input type="text" name="vn_cap" class="form-control vn_cap" placeholder="Enter seating capacity" value="<?php echo $row['yn_capacity']; ?>" />
                    </div>
                    <p class="col-sm-offset-2  text-danger"></p>
                </div>
                <div class="form-group">
                    <label class="col-sm-2">Price <span class="required">*</span></label>
                    <div class="col-sm-10 input-group">
                        <span class="input-group-addon">
                            ₹ &nbsp;
                        </span>
                        <input type="text" name="price" class="form-control vn_price" placeholder="eg.: 100" value="<?php echo $price ?>" />
                    </div>
                    <p class="col-sm-offset-2  text-danger"></p>
                </div>
                <div class="form-group">
                    <label class="col-sm-2">Original Price <span class="required">*</span></label>
                    <div class="col-sm-10 input-group">
                        <span class="input-group-addon">
                            ₹ &nbsp;
                        </span>
                        <input type="text" name="oprice" class="form-control vn_oprice" placeholder="eg.: 100" value="<?php echo $oprice ?>" />
                    </div>
                    <p class="col-sm-offset-2  text-danger"></p>
                </div>
                <div class="form-group">
                    <label class="col-sm-2">Specifications <span class="required">*</span></label>
                    <div class="col-sm-10 input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-file-text"></i>
                        </span>
                        <textarea type="text" name="specifications" class="form-control vn_specs" placeholder="Eg: Air Condition,Etc. please use comma after each specifications."><?php echo $row['yn_specs']; ?></textarea>
                    </div>
                    <p class="col-sm-offset-2 text-danger-bdes text-danger"></p>
                </div>
                <div class="form-group">
                    <label class="col-sm-2">Address <span class="required">*</span></label>
                    <div class="col-sm-10 input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-file-text"></i>
                        </span>
                        <textarea type="text" name="address" class="form-control vn_addrs" placeholder="Enter the Address."><?php echo $row['yn_address']; ?></textarea>
                    </div>
                    <p class="col-sm-offset-2">
                        <i class="fa fa-info"></i> <a href="https://support.google.com/maps/answer/144361?hl=en&co=GENIE.Platform%3DDesktop"> Get Help</a>
                    </p>
                </div>
                <hr>
                <div class="form-group cover">
                    <label class="col-sm-2">Cover Image <span class="required">*</span></label>
                    <div class="col-sm-10 input-group pull-right">
                        <center>
                            <img src="../uploads/<?php echo $cover_image_data['yn_s_images']; ?>" class="img-responsive" alt="Responsive image" width="300" height="240">
                            <br>
                            <button id="cover" class="btn btn-info" type="button"><i class="fa fa-refresh"></i> Change</button>
                        </center>
                        <hr />
                    </div>
                </div>


                <form enctype="multipart/form-data" method="POST" id="update-cover-image">
                    <div class="form-group add-cover">
                        <label class="col-sm-2">Cover Image <span class="required">*</span></label>
                        <div class="col-sm-10 input-group">
                            <div class="custom-file-container" data-upload-id="myFirstImages">
                                <label>Upload Cover Image <span class="text-danger" style="font-size: 12px;">(Images views better in 1400*700)</span></label><a href="javascript:void(0)" class="custom-file-container__image-clear text-danger pull-right" title="Clear Image">Clear</a>
                                <label class="custom-file-container__custom-file">

                                    <input type="hidden" name="type" value="cover">

                                    <input type="hidden" name="image-id" value="<?php echo $cover_image_data['yn_s_imgid']; ?>">

                                    <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*" name="cover-image" required>
                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                </label>
                                <div id="image-data" class="custom-file-container__image-preview"></div>
                            </div>
                        </div>
                        <button class="btn btn-info col-sm-offset-2" type="submit">upload</button>
                    </div>
                    <br>
                </form>


                <div class="form-group other-images">
                    <label class="col-sm-2">Images <span class="required">*</span></label>
                    <div class="col-sm-10 input-group pull-right">
                        <button class="pull-right btn btn-info" id="add-image" type="button"><i class="fa fa-plus"></i> Add image</button>
                        <table class="table">
                            <tbody>
                                <?php foreach ($mul_image as $key => $img_data) { ?>
                                    <tr>
                                        <th scope="row">
                                            <img src="../uploads/<?php echo $img_data['yn_s_images']; ?>" class="img-responsive" alt="Responsive image" width="150">
                                        </th>
                                        <td class="text-right mx-auto" style="vertical-align: middle;">
                                            <button data-id="<?php echo $img_data['yn_s_imgid']; ?>" class="btn btn-danger delete-image" type="button"><i class="fa fa-trash-o"></i> Delete</button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <form enctype="multipart/form-data" method="POST" id="update-multi-image">
                    <div class="form-group add-other-images">
                        <label class="col-sm-2">Upload Image <span class="required">*</span></label>
                        <div class="col-sm-10 input-group">
                            <div class="custom-file-container" data-upload-id="mySecondImages">
                                <label>Upload Mutiple Images <span class="text-danger" style="font-size: 12px;">(Images views better in 940*650, jpg or png is supported)</span></label><a href="javascript:void(0)" class="custom-file-container__image-clear text-danger pull-right" title="Clear Image">Clear all</a>
                                <label class="custom-file-container__custom-file">

                                    <input type="hidden" name="type" value="multi">

                                    <input type="file" class="custom-file-container__custom-file__custom-file-input" multiple name="multi-image[]" required>
                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                </label>
                                <div class="custom-file-container__image-preview"></div>
                            </div>
                        </div>
                        <button class="btn btn-info col-sm-offset-2" type="submit">upload</button>
                    </div>
                    <br>
                </form>
            </div>
            <footer class="panel-footer">
                <div class="row">
                    <div class="col-sm-7 col-sm-offset-5">
                        <button type="submit" name="submit_cus" class="btn btn-primary submit_product">Update</button>
                    </div>
                </div>
            </footer>
        </section>
        <!-- </form> -->
    </div>
<?php } ?>
<script src="./source/js/view-product-single.js"></script>
<script src="./source/js/update-product-data.js"></script>