<!DOCTYPE html>
<html lang="en">
<!-- Head CSS Files -->
<?php include 'lander-components/head.php' ?>
<style type="text/css">
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

        <div class="inn-banner">
            <div class="container">
                <div class="row">
                    <h4>Profile</h4>
                    <p>
                    <ul>
                        <li><a href="index.php">Home</a>
                        </li>
                        <li><a href="my-profile.php">Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--TOP SECTION-->
        <div class="inn-body-section pad-bot-50">
            <div class="container">
                <div class="row inn-page-com">
                    <div class="page-head">
                        <h2>My Profile</h2>
                        <div class="head-title">
                            <div class="hl-1"></div>
                            <div class="hl-2"></div>
                            <div class="hl-3"></div>
                        </div>
                    </div>
                    <!--SERVICES SECTION-->
                    <div class="db-profile-edit">
                        <form class="col s12">
                            <div>
                                <label class="col s12">Name</label>
                                <div class="input-field col s12">
                                    <input type="text" id="UserName" class="validate">
                                </div>
                            </div>
                            <div>
                                <label class="col s12">Email id</label>
                                <div class="input-field col s12">
                                    <input type="email" id="Eml" class="validate">
                                </div>
                            </div>
                            <div>
                                <label class="col s12">Phone</label>
                                <div class="input-field col s12">
                                    <input type="text" id="PhNumber" onkeyup="verifyOTP();" class="validate">
                                    <input type="hidden" id="OldNumber" class="validate">
                                </div>
                            </div>
                            <center>
                                <div class="form-inp otupdateScreen">
                                    <input class="otp otps" type="number" oninput='digitValidate(this)' onkeyup='tabChange(1)' maxlength=1> <b>-</b>
                                    <input class="otp otps" type="number" oninput='digitValidate(this)' onkeyup='tabChange(2)' maxlength=1> <b>-</b>
                                    <input class="otp otps" type="number" oninput='digitValidate(this)' onkeyup='tabChange(3)' maxlength=1> <b>-</b>
                                    <input class="otp otps" type="number" oninput='digitValidate(this)' onkeyup='tabChange(4)' maxlength=1>
                                </div>
                            </center>
                            <div class="noOtp">
                                <div class="input-field col s12">
                                    <input type="submit" value="Verify" class="waves-effect waves-light pro-sub-btn updateOtp" id="pro-sub-btn">
                                </div>
                            </div>
                            <div class="verifyOtpshow">
                                <div class="input-field col s12">
                                    <input type="submit" value="Verify" class="waves-effect waves-light pro-sub-btn verifyOtp" id="pro-sub-btn">
                                </div>
                            </div>
                            <div class="otpUpdate">
                                <div class="input-field col s12">
                                    <input type="submit" value="Update" class="waves-effect waves-light pro-sub-btn updateNootp" id="pro-sub-btn">
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--END SERVICES SECTION-->
                </div>
            </div>
        </div>
        <!--TOP SECTION-->
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
    <script src="customer/source/js/user-profile.js"></script>
</body>

</html>