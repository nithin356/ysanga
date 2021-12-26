<!doctype html>
<html class="fixed">

<head>
    <!--csslinks-->
    <?php include("components/csslinks.php"); ?>
    <style>
        @keyframes ldio-h7cmfxhg4bf {
            0% {
                transform: rotate(0deg)
            }

            50% {
                transform: rotate(180deg)
            }

            100% {
                transform: rotate(360deg)
            }
        }

        .ldio-h7cmfxhg4bf div {
            position: absolute;
            animation: ldio-h7cmfxhg4bf 1s linear infinite;
            width: 160px;
            height: 160px;
            top: 20px;
            left: 20px;
            border-radius: 50%;
            box-shadow: 0 4px 0 0 #e15b64;
            transform-origin: 80px 82px;
        }

        .loadingio-spinner-eclipse-buzqzyg4ugr {
            width: 200px;
            height: 200px;
            display: inline-block;
            overflow: hidden;
            background: #ffffff;
        }

        .ldio-h7cmfxhg4bf {
            width: 100%;
            height: 100%;
            position: relative;
            transform: translateZ(0) scale(1);
            backface-visibility: hidden;
            transform-origin: 0 0;
            /* see note above */
        }

        .ldio-h7cmfxhg4bf div {
            box-sizing: content-box;
        }
    </style>
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

                <div class="tabs">
                    <ul class="nav nav-tabs tabs-primary">
                        <li class="active">
                            <a href="#edit" data-toggle="tab"><i class="fa fa-archive"></i> NEW</a>
                        </li>
                        <li>
                            <a href="#open" data-toggle="tab"><i class="fa fa-tasks"></i> ON PROCESS</a>
                        </li>
                        <li>
                            <a href="#success" data-toggle="tab"><i class="fa fa-check"></i> SUCCESS</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="edit" class="tab-pane active">
                            <div class="container">
                                <div class="row newBookings">
                                    
                                </div>
                            </div>
                        </div>
                        <div id="open" class="tab-pane">
                            <div class="container">
                                <div class="row proccessedBooking">
                                    
                                </div>
                            </div>
                        </div>
                        <div id="success" class="tab-pane">
                            <div class="container">
                                <div class="row completedBooking">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end: page -->
            </section>
        </div>
    </section>

    <!--Script.js-->

    <?php include("components/jslinks.php"); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
    <script src="source/js/admin_profile.js"></script>
    <script src="source/js/booking.js"></script>
</body>

</html>