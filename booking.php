<!DOCTYPE html>
<html lang="en">
<!-- Head CSS Files -->
<?php
include_once 'backend/access/connect.php';
session_start();
$sid =  $_SESSION['yn_sid'];
$useragent = $_SERVER['HTTP_USER_AGENT'];
$mobile = 0;
if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4))) {
    $mobile = 1;
} else {
    $mobile = 0;
}
$dQuery = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM ys_service WHERE yn_sid = '$sid'"));

include 'lander-components/head.php' ?>
<style>
    .owl-nav {
        display: none;
    }

    .colorData {
        background-color: #fa1515 !important;
        font-weight: bold !important;
        color: white !important;
    }

    .ui-state-disabled span {
        color: white !important;
    }

    /* Add styles to the form container */
    .containers {
        position: absolute;
        right: 0;
        margin-right: 10%;
        margin-top: 15%;
        max-width: 350px;
        padding: 16px;
        background-color: white;
        z-index: 2;
        border-radius: 25px;
    }

    /* Set a style for the submit button */
    .btns {
        background-color: #04AA6D;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }

    .btns:hover {
        opacity: 1;
    }

    #ui-datepicker-div {
        z-index: 999999999999999 !important;
    }

    @keyframes ldio-ayfowbn9khk {
        0% {
            opacity: 1
        }

        100% {
            opacity: 0
        }
    }

    .ldio-ayfowbn9khk div {
        left: 94px;
        top: 48px;
        position: absolute;
        animation: ldio-ayfowbn9khk linear 1s infinite;
        background: #3f3d3d;
        width: 12px;
        height: 24px;
        border-radius: 6px / 12px;
        transform-origin: 6px 52px;
    }

    .ldio-ayfowbn9khk div:nth-child(1) {
        transform: rotate(0deg);
        animation-delay: -0.9166666666666666s;
        background: #3f3d3d;
    }

    .ldio-ayfowbn9khk div:nth-child(2) {
        transform: rotate(30deg);
        animation-delay: -0.8333333333333334s;
        background: #3f3d3d;
    }

    .ldio-ayfowbn9khk div:nth-child(3) {
        transform: rotate(60deg);
        animation-delay: -0.75s;
        background: #3f3d3d;
    }

    .ldio-ayfowbn9khk div:nth-child(4) {
        transform: rotate(90deg);
        animation-delay: -0.6666666666666666s;
        background: #3f3d3d;
    }

    .ldio-ayfowbn9khk div:nth-child(5) {
        transform: rotate(120deg);
        animation-delay: -0.5833333333333334s;
        background: #3f3d3d;
    }

    .ldio-ayfowbn9khk div:nth-child(6) {
        transform: rotate(150deg);
        animation-delay: -0.5s;
        background: #3f3d3d;
    }

    .ldio-ayfowbn9khk div:nth-child(7) {
        transform: rotate(180deg);
        animation-delay: -0.4166666666666667s;
        background: #3f3d3d;
    }

    .ldio-ayfowbn9khk div:nth-child(8) {
        transform: rotate(210deg);
        animation-delay: -0.3333333333333333s;
        background: #3f3d3d;
    }

    .ldio-ayfowbn9khk div:nth-child(9) {
        transform: rotate(240deg);
        animation-delay: -0.25s;
        background: #3f3d3d;
    }

    .ldio-ayfowbn9khk div:nth-child(10) {
        transform: rotate(270deg);
        animation-delay: -0.16666666666666666s;
        background: #3f3d3d;
    }

    .ldio-ayfowbn9khk div:nth-child(11) {
        transform: rotate(300deg);
        animation-delay: -0.08333333333333333s;
        background: #3f3d3d;
    }

    .ldio-ayfowbn9khk div:nth-child(12) {
        transform: rotate(330deg);
        animation-delay: 0s;
        background: #3f3d3d;
    }

    .loadingio-spinner-spinner-i7cawj2sq {
        width: 200px;
        height: 200px;
        display: inline-block;
        overflow: hidden;
        background: none;
    }

    .ldio-ayfowbn9khk {
        width: 100%;
        height: 100%;
        position: relative;
        transform: translateZ(0) scale(1);
        backface-visibility: hidden;
        transform-origin: 0 0;
        /* see note above */
    }

    .ldio-ayfowbn9khk div {
        box-sizing: content-box;
    }
</style>
<!-- Head CSS Files -->

<body data-ng-app="">
    <!--MOBILE MENU-->
    <?php include 'lander-components/m-header.php' ?>
    <!--MOBILE MENU-->
    <section>
        <!--TOP HEADER SECTION-->
        <?php include 'lander-components/header.php' ?>
        <!--TOP HEADER SECTION-->

        <!-- YOUR CODE HERE -->
        <!-- <div class="hp-view">
          <iframe src="https://www.w3schools.com/bootstrap/la.jpg" allowfullscreen=""></iframe>
        </div> -->
        <?php
        if ($mobile == 0) { ?>
            <form class="containers" style="display: none;" id="submitData" autocomplete="off">
                <h1>Check Availability</h1>
                <label style="color: grey;"><b>Available Date</b></label>
                <input type="text" id="from" name="from" class="arrival form-control" onchange="getBookdate(this)" readonly="readonly" placeholder="Available Dates">
                <label style="color: grey;"><b>Available Time Slot</b></label>
                <li class="dropdown" style="list-style: none;">
                    <button id="options" aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="btnDrop dropdown-toggle form-control" style="width: 100%;height:45px;background:white;border-radius:3px;text-align: left;padding-left: 4%;font-size: 12px;">Available Time Slot<span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a class="succeShow">Choose the Date </a></li>
                        <li><a class="timeSlotVal" value="1" style="display:none;">9:00 AM - 2:30 PM</a></li>
                        <li><a class="timeSlotVal" value="2" style="display:none;">3:00 PM - 9:00 PM</a></li>
                        <li><a class="timeSlotVal" value="3" style="display:none;">9:00 AM - 9:00 PM</a></li>
                    </ul>
                </li>
                <label style="color: grey;"><b>Event type</b></label>
                <input type="text" class="toe form-control" placeholder="Enter your Event">
                <label style="color: grey;"><b>Organisation Name</b></label>
                <input type="text" id="nameorg" name="nameorg" class="form-control" placeholder="Name or Organisation name">
                <label style="color: grey;"><b>Other Requirements</b></label>
                <input type="text" id="otherReq" name="otherReq" class="form-control" placeholder="Other Requirements">
                <br>
                <center>
                    <input type="submit" value="submit" class="form-btn btnCheckSubmit">
                </center>
            </form>
        <?php
        }
        ?>
        <div id="content">
            <img src="img/siteimages/ezgif-2-6d0b072c3d3f.gif" style="width: 100%;margin-top:50px;" />
        </div>
        <!--END HOTEL ROOMS-->
        <!--CHECK AVAILABILITY FORM-->
        <?php
        if ($mobile == 1) { ?>
            <div class="check-available">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="inn-com-form">
                                <form class="col s12" id="submitData" autocomplete="off">
                                    <div class="alert alert-danger alert-dismissable bookErrordiv" style="display:none;"> <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a> <strong>Warning!</strong> <span class="bookError"></span> </div>
                                    <div class="alert alert-info alert-dismissable bookLoginshow" style="display:none;"> <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a> <strong>Info!</strong> <span class="bookLogin"></span> </div>
                                    <div class="row">
                                        <div class="col s12 avail-title">
                                            <h4>Check Availability</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12 m4 l2">
                                            <input type="text" id="from" name="from" class="arrival" onchange="getBookdate(this)" readonly="readonly">
                                            <label for="from" class="aData">Available Date</label>
                                        </div>
                                        <div class="input-field col s12 m4 l2">
                                            <!-- <select class="timeslot" id="thisData">
                                            <option value="" disabled selected>Time Slot</option>
                                            <option value="1">9:00 AM - 2:30 PM</option>
                                            <option value="2">3:00 PM - 9:00 PM</option>
                                            <option value="3">9:00 AM - 9:00 PM</option>
                                        </select> -->
                                            <!-- <span class="time-slot"></span> -->
                                            <li class="dropdown " style="list-style: none;">
                                                <button id="options" aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="btnDrop dropdown-toggle" style="width: 100%;height:45px;background:white;border:none;border-radius:3px;text-align: left;padding-left: 6%;font-size: 12px;">Available Time Slot<span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="succeShow">Choose the Date </a></li>
                                                    <li><a class="timeSlotVal" value="1" style="display:none;">9:00 AM - 2:30 PM</a></li>
                                                    <li><a class="timeSlotVal" value="2" style="display:none;">3:00 PM - 9:00 PM</a></li>
                                                    <li><a class="timeSlotVal" value="3" style="display:none;">9:00 AM - 9:00 PM</a></li>
                                                </ul>
                                            </li>
                                        </div>
                                        <div class="input-field col s12 m4 l2">
                                            <input type="text" class="toe" placeholder="Enter your Event">
                                        </div>
                                        <div class="input-field col s12 m4 l2">
                                            <input type="text" id="nameorg" name="nameorg" placeholder="Name or Organisation name">
                                        </div>
                                        <div class="input-field col s12 m4 l2">
                                            <input type="text" id="otherReq" name="otherReq" placeholder="Other Requirements">
                                        </div>
                                        <div class="input-field col s12 m4 l2">
                                            <input type="submit" value="submit" class="form-btn btnCheckSubmit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!--END CHECK AVAILABILITY FORM-->
        <div class="hom-com hom-com-block">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="hp-section">
                                <div class="hp-sub-tit hp-sub-tit-block">
                                    <h4 class="serviceName">Loading...</h4>
                                    <p class="serviceSdesc">Loading...</p>
                                </div>
                                <div class="hp-amini detai-2p">
                                    <p class="serviceLdesc">Loading...</p>
                                </div>
                            </div>
                            <div class="hp-section">
                                <div class="hp-sub-tit hp-sub-tit-block">
                                    <h4><span>Facilities</span> of <span class="serviceName"></span></h4>
                                </div>
                                <div class="hp-amini hp-amini-block">
                                    <div class="hideme loadingio-spinner-spinner-i7cawj2sq">
                                        <div class="ldio-ayfowbn9khk">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                    </div>
                                    <ul class="specs">
                                    </ul>
                                </div>
                            </div>
                            <div class="hp-section">
                                <div class="hp-sub-tit hp-sub-tit-block">
                                    <h4><span>Photo Gallery</span> of <span class="serviceName"></span></h4>
                                </div>
                                <div class="">
                                    <div class="h-gal">
                                        <ul class="photoservice">

                                        </ul>
                                        <div class="hideme loadingio-spinner-spinner-i7cawj2sq">
                                            <div class="ldio-ayfowbn9khk">
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hp-section">
                                <div class="hp-sub-tit hp-sub-tit-block">
                                    <h4><span>Ratings</span> <span class="serviceName"></span></h4>
                                </div>
                                <div class="hp-review">
                                    <!-- <div class="hp-review-left">
                                        <div class="hp-review-left-1">
                                            <div class="hp-review-left-11">Excellent</div>
                                            <div class="hp-review-left-12">
                                                <div class="hp-review-left-13"></div>
                                            </div>
                                        </div>
                                        <div class="hp-review-left-1">
                                            <div class="hp-review-left-11">Good</div>
                                            <div class="hp-review-left-12">
                                                <div class="hp-review-left-13 hp-review-left-Good"></div>
                                            </div>
                                        </div>
                                        <div class="hp-review-left-1">
                                            <div class="hp-review-left-11">Satisfactory</div>
                                            <div class="hp-review-left-12">
                                                <div class="hp-review-left-13 hp-review-left-satis"></div>
                                            </div>
                                        </div>
                                        <div class="hp-review-left-1">
                                            <div class="hp-review-left-11">Below Average</div>
                                            <div class="hp-review-left-12">
                                                <div class="hp-review-left-13 hp-review-left-below"></div>
                                            </div>
                                        </div>
                                        <div class="hp-review-left-1">
                                            <div class="hp-review-left-11">Below Average</div>
                                            <div class="hp-review-left-12">
                                                <div class="hp-review-left-13 hp-review-left-poor"></div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="hp-review-right">
                                        <p class="reviewdata">

                                        </p>
                                        <div class="hideme loadingio-spinner-spinner-i7cawj2sq">
                                            <div class="ldio-ayfowbn9khk">
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hp-section">
                                <div class="lp-ur-all-rat lp-ur-all-rat-block">
                                    <ul class="myReview">

                                    </ul>
                                    <a class="waves-effect waves-light wr-re-btn hidemeReview" href="!#" data-toggle="modal" data-target="#commend"><i class="fa fa-edit"></i> Write Review</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!--=========================================-->
                        <div class="hp-call hp-right-com hp-right-com-block">
                            <div class="hp-call-in">
                                <h3><span>Check Availability. Call us!</span><span class="servicePhone">Loading</span></h3><a class="hrefCall">Call Now</a>
                            </div>
                        </div>
                        <!--=========================================-->
                        <!--=========================================-->
                        <div class="hp-book hp-right-com hp-right-com-block">
                            <div class="hp-book-in">
                                <?php echo $dQuery['yn_address'];  ?>
                            </div>
                        </div>
                        <!--=========================================-->
                        <!--=========================================-->
                        <!-- <div class="hp-card hp-right-com hp-right-com-block">
                            <div class="hp-card-in">
                                <h3>We Accept</h3> <span>159 people bookmarked this place</span> <img src="images/card.png" alt="">
                            </div>
                        </div> -->
                        <!--=========================================-->
                    </div>
                </div>
            </div>
        </div>
        <!-- YOUR CODE HERE -->

    </section>
    <a href="!#" data-toggle="modal" data-target="#success" class="clickThisFor" style="display: none;"></a>
    <div id="commend" class="modal fade" role="dialog">
        <div class="log-in-pop">
            <!-- <div class="log-in-pop-left">
                <h1>Hello... <span>{{ name1 }}</span></h1>
                <h1>Hello... <span>{{ name1 }}</span></h1>
            </div> -->
            <div class="log-in-pop-right">
                <a href="#" class="pop-close" data-dismiss="modal"><img src="images/cancel.png" alt="" />
                </a>
                <h4>Write Your Review</h4>
                <form class="s12" id="ratingsForm">
                    <div>
                        <div class="input-field s12" style="width: 100%;">
                            <textarea class="materialize-textarea myReviewData"></textarea>
                            <label>Type your commends</label>
                        </div>
                    </div>
                    <div class="stars">
                        <input onclick="myStar(1);" type="radio" name="star" class="star-1" id="star-1" />
                        <label class="star-1" for="star-1">1</label>
                        <input onclick="myStar(2);" type="radio" name="star" class="star-2" id="star-2" />
                        <label class="star-2" for="star-2">2</label>
                        <input onclick="myStar(3);" type="radio" name="star" class="star-3" id="star-3" />
                        <label class="star-3" for="star-3">3</label>
                        <input onclick="myStar(4);" type="radio" name="star" class="star-4" id="star-4" />
                        <label class="star-4" for="star-4">4</label>
                        <input onclick="myStar(5);" type="radio" name="star" class="star-5" id="star-5" />
                        <label class="star-5" for="star-5">5</label> <span></span>
                    </div>
                    <div>
                        <div class="input-field s4">
                            <input type="button" value="Submit Your Review" onclick="submitReview()" class="waves-effect waves-light log-in-btn">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="success" class="modal fade" role="dialog">
        <div class="log-in-pop">
            <div class="log-in-pop-right" style="width: 100%;">
                <a href="#" class="pop-close" data-dismiss="modal"><img src="images/cancel.png" alt="" />
                </a>
                <h4>Thank you for checking with us!</h4>
                <form>
                    <div>
                        <label>Will get back to you! Thanks for your patience you will be redirected in 3 seconds! <a href="my-bookings.php">Click here to know more!</a></label>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Start Footer SECTION-->
    <?php include 'lander-components/footer.php' ?>
    <!--END Footer SECTION-->

    <!--ALL MODAL FILES-->
    <?php include 'lander-components/register.php' ?>
    <!--ALL MODAL FILES-->

    <!--ALL SCRIPT FILES-->
    <?php include 'lander-components/jslink.php' ?>
    <!--ALL SCRIPT FILES-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
    <script>
    </script>
    <script src="customer/source/js/user-profile.js"></script>

    <?php
    $dateQuery = mysqli_query($connection, "SELECT * FROM ys_user_service WHERE yn_sid = '$sid' AND yn_time=3");
    $newDate = "";
    while ($date = mysqli_fetch_assoc($dateQuery)) {
        $oldDate = $date['yn_arrival'];
        $arr = explode('/', $oldDate);
        $one = ltrim($arr[1], 0);
        $two = ltrim($arr[0], 0);
        $newDate .= "'$one-$two-$arr[2]',";
    }
    ?>
    <script src="customer/source/js/booking.js"></script>
    <script>
        var unavailableDates = [<?php echo substr($newDate, 0, -1);  ?>];
        $("#from").datepicker({
            beforeShowDay: unavailable
        });
    </script>

</body>

</html>