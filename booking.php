<!DOCTYPE html>
<html lang="en">
<!-- Head CSS Files -->
<?php include 'lander-components/head.php' ?>
<style>
    .owl-nav {
        display: none;
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

        </div>
        <!--END HOTEL ROOMS-->
        <!--CHECK AVAILABILITY FORM-->
        <div class="check-available">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="inn-com-form">
                            <form class="col s12">
                                <div class="row">
                                    <div class="col s12 avail-title">
                                        <h4>Check Availability</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12 m4 l2">
                                        <input type="text" id="from" name="from">
                                        <label for="from">Arrival Date</label>
                                    </div>
                                    <div class="input-field col s12 m4 l2">
                                        <select>
                                            <option value="" disabled selected>Time Slot</option>
                                            <option value="1">9:00 AM - 2:30 PM</option>
                                            <option value="2">3:00 PM - 9:00 PM</option>
                                        </select>
                                    </div>
                                    <div class="input-field col s12 m4 l2">
                                        <select>
                                            <option value="" disabled selected hidden>Type of Events</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="1">4</option>
                                        </select>
                                    </div>
                                    <div class="input-field col s12 m4 l2">
                                        <input type="text" id="nameorg" name="nameorg" placeholder="Name or Organisation name">
                                    </div>
                                    <div class="input-field col s12 m4 l2">
                                        <input type="text" id="otherReq" name="otherReq" placeholder="Other Requirements">
                                    </div>
                                    <div class="input-field col s12 m4 l2">
                                        <input type="submit" value="submit" class="form-btn">
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
                                    <p>Aliquam id tempor sem. Cras molestie risus et lobortis congue. Donec id est consectetur, cursus tellus at, mattis lacus.</p>
                                </div>
                                <div class="hp-amini hp-amini-block">
                                    <ul>
                                        <li><img src="images/icon/a1.png" alt=""> Elevator in building</li>
                                        <li><img src="images/icon/a2.png" alt=""> Friendly workspace</li>
                                        <li><img src="images/icon/a3.png" alt=""> Instant Book</li>
                                        <li><img src="images/icon/a4.png" alt=""> Wireless Internet</li>
                                        <li><img src="images/icon/a5.png" alt=""> Free parking on premises</li>
                                        <li><img src="images/icon/a6.png" alt=""> Free parking on street</li>
                                        <li><img src="images/icon/a7.png" alt=""> Elevator in building</li>
                                        <li><img src="images/icon/a8.png" alt=""> Friendly workspace</li>
                                        <li><img src="images/icon/a9.png" alt=""> Instant Book</li>
                                        <li><img src="images/icon/a10.png" alt=""> Wireless Internet</li>
                                        <li><img src="images/icon/a11.png" alt=""> Free parking on premises</li>
                                        <li><img src="images/icon/a12.png" alt=""> Free parking on street</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="hp-section">
                                <div class="hp-sub-tit hp-sub-tit-block">
                                    <h4><span>Photo Gallery</span> Master Suite</h4>
                                    <p>Aliquam id tempor sem. Cras molestie risus et lobortis congue. Donec id est consectetur, cursus tellus at, mattis lacus.</p>
                                </div>
                                <div class="">
                                    <div class="h-gal">
                                        <ul class="photoservice">
                                        
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="hp-section">
                                <div class="hp-sub-tit hp-sub-tit-block">
                                    <h4><span>Ratings</span> Suite Room</h4>
                                    <p>Aliquam id tempor sem. Cras molestie risus et lobortis congue. Donec id est consectetur, cursus tellus at, mattis lacus.</p>
                                </div>
                                <div class="hp-review">
                                    <div class="hp-review-left">
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
                                    </div>
                                    <div class="hp-review-right">
                                        <h5>Overall Ratings</h5>
                                        <p><span>4.5 <i class="fa fa-star" aria-hidden="true"></i></span> based on 242 reviews</p>
                                    </div>
                                </div>
                            </div>
                            <div class="hp-section">
                                <div class="hp-sub-tit hp-sub-tit-block">
                                    <h4><span>USER</span> REVIEWS</h4>
                                    <p>Aliquam id tempor sem. Cras molestie risus et lobortis congue. Donec id est consectetur, cursus tellus at, mattis lacus.</p>
                                </div>
                                <div class="lp-ur-all-rat lp-ur-all-rat-block">
                                    <ul>
                                        <li>
                                            <div class="lr-user-wr-img"> <img src="images/users/2.png" alt=""> </div>
                                            <div class="lr-user-wr-con lr-user-wr-con-block">
                                                <h6>Jacob Michael <span>4.5 <i class="fa fa-star" aria-hidden="true"></i></span></h6> <span class="lr-revi-date">19th January, 2017</span>
                                                <p>Good service... nice and clean rooms... very good spread of buffet and friendly staffs. Located in heart of city and easy to reach any places in a short distance. </p>
                                                <ul>
                                                    <li><a href="#!"><span>Like</span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><span>Dis-Like</span><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><span>Report</span> <i class="fa fa-flag-o" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><span>Comments</span> <i class="fa fa-commenting-o" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><span>Share Now</span> <i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="lr-user-wr-img"> <img src="images/users/3.png" alt=""> </div>
                                            <div class="lr-user-wr-con lr-user-wr-con-block">
                                                <h6>Gabriel Elijah <span>5.0 <i class="fa fa-star" aria-hidden="true"></i></span></h6> <span class="lr-revi-date">21th July, 2016</span>
                                                <p>The hotel is clean, convenient and good value for money. Staff are courteous and helpful. However, they need more training to be efficient.</p>
                                                <ul>
                                                    <li><a href="#!"><span>Like</span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><span>Dis-Like</span><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><span>Report</span> <i class="fa fa-flag-o" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><span>Comments</span> <i class="fa fa-commenting-o" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><span>Share Now</span> <i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="lr-user-wr-img"> <img src="images/users/4.png" alt=""> </div>
                                            <div class="lr-user-wr-con lr-user-wr-con-block">
                                                <h6>Luke Mason <span>4.2 <i class="fa fa-star" aria-hidden="true"></i></span></h6> <span class="lr-revi-date">21th March, 2018</span>
                                                <p>Too much good experience with hospitality, cleanliness, facility and privacy and good value for money... To keep mind relaxing... Keep it up... </p>
                                                <ul>
                                                    <li><a href="#!"><span>Like</span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><span>Dis-Like</span><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><span>Report</span> <i class="fa fa-flag-o" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><span>Comments</span> <i class="fa fa-commenting-o" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><span>Share Now</span> <i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="lr-user-wr-img"> <img src="images/users/5.png" alt=""> </div>
                                            <div class="lr-user-wr-con lr-user-wr-con-block">
                                                <h6>Kevin Jack <span>3.6 <i class="fa fa-star" aria-hidden="true"></i></span></h6> <span class="lr-revi-date">21th Aug, 2018</span>
                                                <p>I am deaf. Bar is closed and Restaurant is okay ... It should be more decoration as beautiful. I enjoyed swimming top floor and weather is good</p>
                                                <ul>
                                                    <li><a href="#!"><span>Like</span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><span>Dis-Like</span><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><span>Report</span> <i class="fa fa-flag-o" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><span>Comments</span> <i class="fa fa-commenting-o" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><span>Share Now</span> <i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="lr-user-wr-img"> <img src="images/users/6.png" alt=""> </div>
                                            <div class="lr-user-wr-con lr-user-wr-con-block">
                                                <h6>Nicholas Tyler <span>4.4 <i class="fa fa-star" aria-hidden="true"></i></span></h6> <span class="lr-revi-date">21th Aug, 2018</span>
                                                <p>Overall, it was good experience. Rooms were spacious and they were kept very clean and tidy. Room service was good.</p>
                                                <ul>
                                                    <li><a href="#!"><span>Like</span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><span>Dis-Like</span><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><span>Report</span> <i class="fa fa-flag-o" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><span>Comments</span> <i class="fa fa-commenting-o" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><span>Share Now</span> <i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul> <a class="waves-effect waves-light wr-re-btn" href="!#" data-toggle="modal" data-target="#commend"><i class="fa fa-edit"></i> Write Review</a>
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
                                <button class="like-button"><i class="fa fa-heart-o"></i> Bookmark this listing</button> <span>159 people bookmarked this place</span>
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i> Share</a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-twitter"></i> Tweet</a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i> Share</a>
                                    </li>
                                    <!-- <li><a class="pinterest-share" href="#"><i class="fa fa-pinterest-p"></i> Pin</a></li> -->
                                </ul>
                            </div>
                        </div>
                        <!--=========================================-->
                        <!--=========================================-->
                        <div class="hp-card hp-right-com hp-right-com-block">
                            <div class="hp-card-in">
                                <h3>We Accept</h3> <span>159 people bookmarked this place</span> <img src="images/card.png" alt="">
                            </div>
                        </div>
                        <!--=========================================-->
                    </div>
                </div>
            </div>
        </div>
        <!-- YOUR CODE HERE -->

    </section>

    <!--Start Footer SECTION-->
    <?php include 'lander-components/footer.php' ?>
    <!--END Footer SECTION-->

    <!--ALL MODAL FILES-->
    <?php include 'lander-components/register.php' ?>
    <!--ALL MODAL FILES-->

    <!--ALL SCRIPT FILES-->
    <?php include 'lander-components/jslink.php' ?>
    <!--ALL SCRIPT FILES-->
    <script src="customer/source/js/booking.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

</body>

</html>