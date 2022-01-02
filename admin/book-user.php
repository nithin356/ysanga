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
                        <form id="booking-form" class="" enctype="multipart/form-data" method="POST">
                            <section class="panel">
                                <header class="panel-heading">
                                    <h2 class="panel-title">Book auditorium</h2>
                                    <p class="panel-subtitle">
                                        Please Book your auditorium for users below.
                                    </p>
                                </header>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">User Name <span class="required">*</span></label>
                                        <div class="col-sm-10 input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </span>
                                            <input type="text" name="sname" class="form-control usname" placeholder="Enter User Name" />
                                        </div>
                                        <p class="col-sm-offset-2 text-danger-pname text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2">User Email <span class="required">*</span></label>
                                        <div class="col-sm-10 input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                            <input type="text" name="semail" class="form-control vn_email" placeholder="Enter Email Id" />
                                        </div>
                                        <p class="col-sm-offset-2 text-danger-sdes text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2">User Phone <span class="required">*</span></label>
                                        <div class="col-sm-10 input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </span>
                                            <input type="text" name="sphone" maxlength="10" class="form-control vn_phone" placeholder="Enter Phone number"></input>
                                        </div>
                                        <p class="col-sm-offset-2 text-danger-bdes text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2">Select Auditorium <span class="required">*</span></label>
                                        <div class="col-sm-10 input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-list"></i>
                                            </span>
                                            <select onchange="runthis(this);" name="saudi" id="saudi" class="form-control saudi" required>
                                                <option value="" disabled selected hidden>Select</option>
                                                <?php
                                                $sql = "SELECT * FROM ys_service WHERE yn_a_id=$globaladminid";
                                                $result = mysqli_query($connection, $sql);
                                                $count = mysqli_num_rows($result);
                                                if ($count < 1) { ?>
                                                    <option>No Records <?php echo $globaladminid ?></option>
                                                <?php } else { ?>

                                                <?php foreach ($result as $key2 => $row_bt) {
                                                        $sr_id = $row_bt['yn_sid'];
                                                        $sr_name = $row_bt['yn_sname'];
                                                        echo "<option value='$sr_id'> $sr_name </option>";
                                                    }
                                                } ?>
                                            </select>
                                        </div>
                                        <p class="col-sm-offset-2 text-danger-bdes text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2">Arrival Date <span class="required">*</span></label>
                                        <div class="col-sm-10 input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar-o"></i>
                                            </span>
                                            <input id="from" type="text" name="adate" class="form-control vn_adate" placeholder="Arrival Date"></input>
                                        </div>
                                        <p class="col-sm-offset-2 text-danger-bdes text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2">Organisation <span class="required"></span></label>
                                        <div class="col-sm-10 input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-building"></i>
                                            </span>
                                            <input type="text" name="organisation" value="N/A" class="form-control vn_organisation" placeholder="Enter Organisation"></input>
                                        </div>
                                        <p class="col-sm-offset-2 text-danger-bdes text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2">Price <span class="required"></span></label>
                                        <div class="col-sm-10 input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-rupee"></i>
                                            </span>
                                            <input type="text" name="price" class="form-control vn_price" placeholder="Enter Price"></input>
                                        </div>
                                        <p class="col-sm-offset-2 text-danger-bdes text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2">Time Slot <span class="required">*</span></label>
                                        <div class="col-sm-10 input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            <select name="tslot" id="tslot" class="form-control tslot" required>
                                                <option value="" disabled selected>Time Slot</option>
                                                <option value="1">9:00 AM - 2:30 PM</option>
                                                <option value="2">3:00 PM - 9:00 PM</option>
                                            </select>
                                        </div>
                                        <p class="col-sm-offset-2 text-danger-bdes text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2">Event Type <span class="required">*</span></label>
                                        <div class="col-sm-10 input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-list"></i>
                                            </span>
                                            <select name="etype" id="etype" class="form-control etype" required>
                                                <option value="" disabled selected hidden>Type of Events</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="1">4</option>
                                            </select>
                                        </div>
                                        <p class="col-sm-offset-2 text-danger-bdes text-danger"></p>
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
    <script src="source/js/user_booking.js"></script>
    <script src="source/js/admin_profile.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script>
        var unavailableDates = [];

        function runthis(e) {
            var valueofaudi = $(e).val();
            $.ajax({
                type: "POST",
                url: "./source/session-audi.php",
                data: {
                    sid: valueofaudi
                },
                success: function(response) {
                    var jsonData = JSON.parse(response);
                    if (jsonData.status === "KO") {
                        //do nothng
                    } else {
                        unavailableDates.push(jsonData);
                        console.log(unavailableDates);
                        $("#from").datepicker({
                            beforeShowDay: unavailable,
                        });
                    }
                },
            });
        }


        function unavailable(date) {
            dmy = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();
            if ($.inArray(dmy, unavailableDates) == -1) {
                return [true, ""];
            } else {
                return [false, "", "Unavailable"];
            }
        }
    </script>

</body>

</html>