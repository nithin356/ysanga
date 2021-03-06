<section>
    <div id="modal1" class="modal fade" role="dialog">
        <div class="log-in-pop">
            <div class="log-in-pop-left">
                <h1>Hello... <span>{{ name }}</span></h1>
                <p>Don't have an account? Create your account. It's take less then a minutes! <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal2" style="color:white;font-weight:bold;">Click here to Register</a></p>
                <ul>
                    <li><a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal2"><i class="fa fa-plus"></i> Create a new account</a>
                    </li>
                </ul>
            </div>
            <div class="log-in-pop-right">
                <a href="#" class="pop-close loginClose" data-dismiss="modal"><img src="images/cancel.png" alt="" />
                </a>
                <h4>Login</h4>
                <div class="alert alert-danger alert-dismissable loginErrordiv"> <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a> <strong>Warning!</strong> <span class="loginError"></span> </div>
                <form class="s12">
                    <div class="phoneField">
                        <div class="input-field s12">
                            <input type="text" maxlength="10" id="phone" data-ng-model="phone" class="validate">
                            <label class="phoneData">Phone Number</label>
                        </div>
                        <br />
                    </div>
                    <center>
                        <div class="form-inp otpScreen">
                            <input class="otp" type="number" oninput='digitValidate(this)' onkeyup='tabChange(1)' maxlength=1> <b>-</b>
                            <input class="otp" type="number" oninput='digitValidate(this)' onkeyup='tabChange(2)' maxlength=1> <b>-</b>
                            <input class="otp" type="number" oninput='digitValidate(this)' onkeyup='tabChange(3)' maxlength=1> <b>-</b>
                            <input class="otp" type="number" oninput='digitValidate(this)' onkeyup='tabChange(4)' maxlength=1>
                        </div>
                        <div>
                            <div class="input-field s4 lgnBtn">
                                <input type="button" id="login" value="Login" class="waves-effect waves-light log-in-btn">
                            </div>
                            <div class="input-field s4 vryBtn">
                                <input type="button" id="verify" value="Verify" class="waves-effect waves-light log-in-btn">
                            </div>
                        </div>
                        <div class="otpScreen"></div>
                        <span id="timer" class="text-success"></span>
                    </center>
                </form>
            </div>
        </div>
    </div>

    <!-- REGISTER SECTION -->
    <div id="modal2" class="modal fade" role="dialog">
        <div class="log-in-pop">
            <div class="log-in-pop-left">
                <h1>Hello... <span>{{ name1 }}</span></h1>
                <p>Don't have an account? Create your account. It's take less then a minutes</p>
                <h4>Own an account?</h4>
                <ul>
                    <li><a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal1"><i class="fas fa-sign-in-alt"></i> Login</a>
                    </li>
                </ul>
            </div>
            <div class="log-in-pop-right">
                <a href="#" class="pop-close regClose" data-dismiss="modal"><img src="images/cancel.png" alt="" />
                </a>
                <!-- <h4>Create an Account</h4> -->
                <div class="alert alert-danger alert-dismissable RegErrordiv"> <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a> <strong>Warning!</strong> <span class="RegError"></span> </div>
                <form class="s12">
                    <div>
                        <div class="input-field s12">
                            <input type="text" id="Rusername" data-ng-model="name1" class="validate">
                            <label>User name</label>
                        </div>
                    </div>
                    <div>
                        <div class="input-field s12">
                            <input type="number" id="Rphonenumber" class="validate">
                            <label>Phone Number</label>
                        </div>
                    </div>
                    <div>
                        <div class="input-field s12">
                            <input type="email" id="Remail" class="validate">
                            <label>Email id</label>
                        </div>
                    </div>
                    <div style="margin-left: -5%;">
                        <div class="input-field s12">
                            <input type="checkbox" class="form-check-input" id="AgreeCheck">
                            <label class="form-check-label" for="AgreeCheck">Agree Our Terms and Conditions!</label>
                        </div>
                    </div>
                    <div style="margin-top: 14px;">
                        <center>
                            <div class="input-field s4">
                                <input type="button" id="Rsubmit" value="Register" class="waves-effect waves-light log-in-btn register">
                            </div>
                            <br>
                            <label class="form-check-label">Already have an Account ?<a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal1">Login</a></label>

                        </center>

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>