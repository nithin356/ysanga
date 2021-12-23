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
                <div class="row" id="view-product-single">
                    <!-- get data-->
                    <?php //include "source/view-product-single.php"; 
                    ?>

                </div>
                <!-- end: page -->
            </section>
        </div>
    </section>
    <!--Script.js-->
    <?php include "components/jslinks.php"; ?>    
    <script>
        $(document).ready(function() {
            $("#view-product-single").load("./source/view-audit.php");
        });

        function load_product() {
            $("#view-product-single").load("./source/view-audit.php");
        }
    </script>
    <script src="source/js/admin_profile.js"></script>
</body>

</html>