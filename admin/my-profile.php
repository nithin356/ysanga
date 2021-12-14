<!doctype html>
<html class="fixed">

<head>
    <!--csslinks-->
    <?php include("components/csslinks.php"); ?>
</head>

<body>
    <section class="body">

        <!-- start: header -->
        <?php include("components/header.php"); ?>
        <!-- end: header -->

        <div class="inner-wrapper">
            <!-- start: sidebar -->
            <?php include("components/sidebar.php"); ?>
            <!-- end: sidebar -->

            <section role="main" class="content-body">
                <!--Header-->
                <?php include("components/header2.php"); ?>
                <!--end header-->

                <!-- start: page -->

                <div class="row">
                    <div class="col-md-4 col-lg-3">

                        <section class="panel">
                            <div class="panel-body">
                                <div class="thumb-info mb-md">
                                    <img src="../admin-assets/images/!logged-user.jpg" class="rounded img-responsive" alt="John Doe">
                                    <div class="thumb-info-title">
                                        <span class="thumb-info-inner name"></span>
                                        <span class="thumb-info-type">Admin</span>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-md-10 col-lg-8">

                        <div class="tabs">
                            <ul class="nav nav-tabs tabs-primary">
                                <li class="active">
                                    <a href="#edit" data-toggle="tab">Edit</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="edit" class="tab-pane active">


                                    <h4 class="mb-xlg">Personal Information</h4>
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="profileFirstName">Full Name</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control profileFulname" id="profileFulname">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="profileEmail">Email</label>
                                            <div class="col-md-8">
                                                <input type="email" class="form-control profileEmail" id="profileEmail" value="" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="profileAddress">Phone</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control profilePhone" id="profilePhone">
                                            </div>
                                        </div>
                                    </fieldset>
                                    <hr class="dotted tall">
                                    <h4 class="mb-xlg">Change Password</h4>
                                    <fieldset class="mb-xl">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="profileOldPassword">Old Password</label>
                                            <div class="col-md-8">
                                                <input type="password" class="form-control profileOldPassword" id="profileOldPassword">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="profileNewPassword">New Password</label>
                                            <div class="col-md-8">
                                                <input type="password" class="form-control profileNewPassword" id="profileNewPassword">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="profileNewPasswordRepeat">Repeat New Password</label>
                                            <div class="col-md-8">
                                                <input type="password" class="form-control profilePasswordRepeat" id="profilePasswordRepeat">
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="panel-footer">
                                        <div class="row">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="button" class="btn btn-primary profile_btn">Submit</button>
                                                <button type="reset" class="btn btn-default">Reset</button>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end: page -->
            </section>
        </div>

        <aside id="sidebar-right" class="sidebar-right">
            <div class="nano">
                <div class="nano-content">
                    <a href="#" class="mobile-close visible-xs">
                        Collapse <i class="fa fa-chevron-right"></i>
                    </a>

                    <div class="sidebar-right-wrapper">

                        <div class="sidebar-widget widget-calendar">
                            <h6>Upcoming Tasks</h6>
                            <div data-plugin-datepicker data-plugin-skin="dark"></div>

                            <ul>
                                <li>
                                    <time datetime="2014-04-19T00:00+00:00">04/19/2014</time>
                                    <span>Company Meeting</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
    </section>

    <!--Script.js-->

    <?php include("components/jslinks.php"); ?>
    <script src="source/js/admin_profile.js"></script>
</body>

</html>