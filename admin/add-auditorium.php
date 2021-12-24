<!doctype html>
<html class="fixed">

<head>
    <!--csslinks-->
    <?php include "components/csslinks.php"; ?>
</head>

<body>
    <section class="body">

        <!-- start: header -->
        <?php include "components/header.php"; ?>
        <!-- end: header -->

        <div class="inner-wrapper">
            <!-- start: sidebar -->
            <?php include "components/sidebar.php"; ?>
            <!-- end: sidebar -->

            <section role="main" class="content-body">
                <!--Header-->
                <?php include "components/header2.php"; ?>
                <!--end header-->

                <!-- start: page -->
                <div class="row">
                    <div class="col-md-12">
                        <form id="product-form" class="" enctype="multipart/form-data" method="POST">
                            <section class="panel">
                                <header class="panel-heading">
                                    <h2 class="panel-title">Add auditorium</h2>
                                    <p class="panel-subtitle">
                                        Please add your auditorium details below.
                                    </p>
                                </header>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Product Name <span class="required">*</span></label>
                                        <div class="col-sm-10 input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-tag"></i>
                                            </span>
                                            <input type="text" name="name" class="form-control" placeholder="Enter your Product Name" />
                                        </div>
                                        <p class="col-sm-offset-2 text-danger-pname text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2">Short Description <span class="required">*</span></label>
                                        <div class="col-sm-10 input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-file-text"></i>
                                            </span>
                                            <input type="text" name="sdesc" class="form-control vn_sdesc" placeholder="Short Description of your product" />
                                        </div>
                                        <p class="col-sm-offset-2 text-danger-sdes text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2">Description <span class="required">*</span></label>
                                        <div class="col-sm-10 input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-file-text"></i>
                                            </span>
                                            <textarea type="text" name="ldesc" class="form-control vn_bdesc" placeholder="Brief Description"></textarea>
                                        </div>
                                        <p class="col-sm-offset-2 text-danger-bdes text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2">Capacity <span class="required">*</span></label>
                                        <div class="col-sm-10 input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-file-text"></i>
                                            </span>
                                            <textarea type="text" name="capac" class="form-control vn_cap" placeholder="Enter the room capacity"></textarea>
                                        </div>
                                        <p class="col-sm-offset-2 text-danger-bdes text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2">Phone <span class="required">*</span></label>
                                        <div class="col-sm-10 input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-file-text"></i>
                                            </span>
                                            <textarea type="text" name="phone" class="form-control vn_phone" placeholder="Enter the phone number"></textarea>
                                        </div>
                                        <p class="col-sm-offset-2 text-danger-bdes text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2">Price <span class="required">*</span></label>
                                        <div class="col-sm-10 input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-file-text"></i>
                                            </span>
                                            <textarea type="text" name="price" class="form-control vn_price" placeholder="Enter the price"></textarea>
                                        </div>
                                        <p class="col-sm-offset-2 text-danger-bdes text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2">Specifications <span class="required">*</span></label>
                                        <div class="col-sm-10 input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-file-text"></i>
                                            </span>
                                            <textarea type="text" name="specifications" class="form-control vn_specs" placeholder="Eg: Air Condition,Etc. please use comma after each specifications."></textarea>
                                        </div>
                                        <p class="col-sm-offset-2 text-danger-bdes text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2">Address <span class="required">*</span></label>
                                        <div class="col-sm-10 input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-file-text"></i>
                                            </span>
                                            <textarea type="text" name="address" class="form-control vn_addr" placeholder="Enter the Address."></textarea>
                                        </div>
                                        <p class="col-sm-offset-2 text-danger-bdes text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2">Cover Image <span class="required">*</span></label>
                                        <div class="col-sm-10 input-group">
                                            <div class="custom-file-container" data-upload-id="myFirstImage">
                                                <label>Upload Main Image <span class="text-danger" style="font-size: 12px;">(Images views better in 1400*700 , jpg or png is supported)</span> </label><a href="javascript:void(0)" class="custom-file-container__image-clear text-danger pull-right" title="Clear Image">Clear</a>
                                                <label class="custom-file-container__custom-file">
                                                    <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*" name="cover-image" required>
                                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                </label>
                                                <div class="custom-file-container__image-preview"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2">Upload Image <span class="required">*</span></label>
                                        <div class="col-sm-10 input-group">
                                            <div class="custom-file-container" data-upload-id="mySecondImage">
                                                <label>Upload Mutiple Images <span class="text-danger" style="font-size: 12px;">(Images views better in 940*650, jpg or png is supported)</span>  </label><a href="javascript:void(0)" class="custom-file-container__image-clear text-danger pull-right" title="Clear Image">Clear all</a>
                                                <label class="custom-file-container__custom-file">
                                                    <input type="file" class="custom-file-container__custom-file__custom-file-input" multiple name="multi-image[]" required>
                                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                </label>
                                                <div class="custom-file-container__image-preview"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <footer class="panel-footer">
                                    <div class="row">
                                        <div class="col-sm-7 pull-right">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </footer>

                            </section>
                        </form>
                    </div>
                </div>
                <!-- end: page -->
            </section>
        </div>
    </section>
    <!--Script.js-->
    <?php include "components/jslinks.php"; ?>
    <script src="source/js/add-audit.js"></script>
    <script src="source/js/admin_profile.js"></script>

</body>

</html>