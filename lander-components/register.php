<section>
<div id="modal1" class="modal fade" role="dialog">
    <div class="log-in-pop">
        <div class="log-in-pop-left">
            <h1>Hello... <span>{{ name }}</span></h1>
            <p>Don't have an account? Create your account. It's take less then a minutes</p>
            <h4>Login with social media</h4>
            <ul>
                <li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
                </li>
                <li><a href="#"><i class="fa fa-google"></i> Google+</a>
                </li>
                <li><a href="#"><i class="fa fa-twitter"></i> Twitter</a>
                </li>
            </ul>
        </div>
        <div class="log-in-pop-right">
            <a href="#" class="pop-close" data-dismiss="modal"><img src="images/cancel.png" alt="" />
            </a>
            <h4>Login</h4>
            <p>Don't have an account? Create your account. It's take less then a minutes</p>
            <form class="s12">
                <div>
                    <div class="input-field s12">
                        <input type="text" id="Phno" data-ng-model="name" class="validate">
                        <label>Phone Number</label>
                    </div>
                </div>
                <!-- <div>
                    <div class="input-field s12">
                        <input type="password" id="pswd" class="validate">
                        <label>Password</label>
                    </div>
                </div> -->
                <div>
                    <div class="s12 log-ch-bx">
                        <p>
                            <input type="checkbox" id="test5" />
                            <label for="test5">Remember me</label>
                        </p>
                    </div>
                </div>
                <div>
                    <div class="input-field s4">
                        <input type="submit" id="Ulogin" value="Login" class="waves-effect waves-light log-in-btn">
                    </div>
                </div>
                <div>
                    <div class="input-field s12"> <a href="#" id="Otp" data-dismiss="modal" data-toggle="modal" data-target="#modal3">OTP</a> | <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal2">Create a new account</a> </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modal2" class="modal fade" role="dialog">
    <div class="log-in-pop">
        /z
        <div class="log-in-pop-right">
            <a href="#" class="pop-close" data-dismiss="modal"><img src="images/cancel.png" alt="" />
            </a>
            <h4>Create an Account</h4>
            <p>Don't have an account? Create your account. It's take less then a minutes</p>
            <form class="s12">
                <div>
                    <div class="input-field s12">
                        <input type="text" id="Rusername" data-ng-model="name1" class="validate">
                        <label>User name</label>
                    </div>
                </div>
                <div>
                    <div class="input-field s12">
                        <input type="email" id="Remail" class="validate">
                        <label>Email id</label>
                    </div>
                </div>
                <div>
                    <div class="input-field s12">
                        <input type="password" id="Rpswd" class="validate">
                        <label>Password</label>
                    </div>
                </div>
                <div>
                    <div class="input-field s12">
                        <input type="password" id="Rcpswd" class="validate">
                        <label>Confirm password</label>
                    </div>
                </div>
                <div>
                    <div class="input-field s4">
                        <input type="submit" id="Rgstr" value="Register" class="waves-effect waves-light log-in-btn">
                    </div>
                </div>
                <div>
                    <div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal1">Are you a already member ? Login</a> </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="modal3" class="modal fade" role="dialog">
    <div class="log-in-pop">
        <!-- <div class="log-in-pop-left">
            <h1>Hello... <span>{{ name3 }}</span></h1>
            <p>Don't have an account? Create your account. It's take less then a minutes</p>
            <h4>Login with social media</h4>
            <ul>
                <li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
                </li>
                <li><a href="#"><i class="fa fa-google"></i> Google+</a>
                </li>
                <li><a href="#"><i class="fa fa-twitter"></i> Twitter</a>
                </li>
            </ul>
        </div> -->
        <div class="log-in-pop-right">
            <a href="#" class="pop-close" data-dismiss="modal"><img src="images/cancel.png" alt="" />
            </a>
            <h4>Forgot password</h4>
            <p>Don't have an account? Create your account. It's take less then a minutes</p>
            <form class="s12">
                <div>
                    <div class="input-field s12">
                        <input type="text" data-ng-model="name3" class="validate">
                        <label>User name or email id</label>
                    </div>
                </div>
                <div>
                    <div class="input-field s4">
                        <input type="submit" value="Submit" class="waves-effect waves-light log-in-btn">
                    </div>
                </div>
                <div>
                    <div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal1">Are you a already member ? Login</a> | <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal2">Create a new account</a> </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="FrontEnd/login.js"></script>
</section>
