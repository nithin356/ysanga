<!DOCTYPE html>
<html lang="en">
<!-- Head CSS Files -->
<?php
include_once 'backend/access/connect.php';
session_start();
include 'lander-components/head.php' ?>
<style>
    .owl-nav {
        display: none;
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
        <div id="content">
            <img src="img/siteimages/ezgif-2-6d0b072c3d3f.gif" style="width: 100%;margin-top:50px;" />
        </div>
        <!--END HOTEL ROOMS-->
        <!--CHECK AVAILABILITY FORM-->
        <div class="check-available">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="inn-com-form">
                            <form class="col s12" id="submitData">
                                <div class="alert alert-danger alert-dismissable bookErrordiv"> <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a> <strong>Warning!</strong> <span class="bookError"></span> </div>
                                <div class="alert alert-info alert-dismissable bookLoginshow"> <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a> <strong>Info!</strong> <span class="bookLogin"></span> </div>
                                <div class="row">
                                    <div class="col s12 avail-title">
                                        <h4>Check Availability</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12 m4 l2">
                                        <input type="text" id="from" name="from" class="arrival">
                                        <label for="from" class="aData">Available Date</label>
                                    </div>
                                    <div class="input-field col s12 m4 l2">
                                        <select class="timeslot">
                                            <option value="" disabled selected>Time Slot</option>
                                            <option value="1">9:00 AM - 2:30 PM</option>
                                            <option value="2">3:00 PM - 9:00 PM</option>
                                        </select>
                                        <span class="time-slot"></span>
                                    </div>
                                    <div class="input-field col s12 m4 l2">
                                        <select class="toe">
                                            <option value="" disabled selected hidden>Type of Events</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="1">4</option>
                                        </select>
                                        <span class="event-slot"></span>
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
                                    <h4><span>Aminitiese</span> Room</h4>
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
                            <div class="hp-call-in"> <img src="images/icon/dbc4.png" alt="">
                                <h3><span>Check Availability. Call us!</span><span class="servicePhone">Loading</span></h3> <small>We are available 24/7 Monday to Sunday</small> <a class="hrefCall">Call Now</a>
                            </div>
                        </div>
                        <!--=========================================-->
                        <!--=========================================-->
                        <div class="hp-book hp-right-com hp-right-com-block">
                            <div class="hp-book-in">
                                <!-- <button class="like-button"><i class="fa fa-heart-o"></i> Bookmark this listing</button> -->
                                <span class="address"></span>
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
    <script src="customer/source/js/booking.js"></script>
    <script src="customer/source/js/user-profile.js"></script>

    <?php
    $sid =  $_SESSION['yn_sid'];
    $dateQuery = mysqli_query($connection, "SELECT * FROM ys_user_service WHERE yn_sid = '$sid'");
    $newDate = "";
    while ($date = mysqli_fetch_assoc($dateQuery)) {
        $oldDate = $date['yn_arrival'];
        $arr = explode('/', $oldDate);
        $one = ltrim($arr[1], 0);
        $two = ltrim($arr[0], 0);
        $newDate .= "'$one-$two-$arr[2]',";
    }
    ?>
    <script>
        var unavailableDates = [<?php echo substr($newDate, 0, -1);  ?>];

        function unavailable(date) {
            dmy = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();
            if ($.inArray(dmy, unavailableDates) == -1) {
                return [true, ""];
            } else {
                return [false, "", "Unavailable"];
            }
        }

        $("#from").datepicker({
            beforeShowDay: unavailable
        });
    </script>
</body>

</html>