<!doctype html>
<html class="fixed sidebar-left-collapsed">

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
                <section class="content-with-menu content-with-menu-has-toolbar media-gallery">
                    <div class="content-with-menu-container" style="padding: 0px 20px 0px 20px; margin-top:20px;">
                        <input type="text" class="form-control" id="Search-product" placeholder="Enter Product name to search.." title="Type in a name">
                        </input>               
                        <div class="row mg-files get-product-data" data-sort-destination data-sort-id="media-gallery">

                        </div>
                    </div>
                </section>
                <!-- end: page -->
            </section>
        </div>
    </section>
    <!--Script.js-->
    <?php include "components/jslinks.php"; ?>
    <script src="source/js/view-audit.js"></script>
	<script src="source/js/admin_profile.js"></script>

</body>

</html>