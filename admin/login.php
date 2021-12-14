<!doctype html>
<html class="fixed">

<head>
	<!--csslinks-->
	<?php include("components/csslinks.php"); ?>
</head>

<body>
	<!-- start: page -->
	<section class="body-sign">
		<div class="center-sign">
			<a href="/" class="logo pull-left">
				<img src="../admin-assets/images/q-logo.svg" height="54" alt="Porto Admin" />
			</a>

			<div class="panel panel-sign">
				<div class="panel-title-sign mt-xl text-right">
					<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
				</div>
				<div class="panel-body">

					<div class="form-group mb-lg">
						<label>Email/Phone</label>
						<div class="input-group input-group-icon">
							<input name="email" placeholder="Enter your email or phone" id="email" type="text" class="form-control input-lg" />
							<p class="text-danger emailError"></p>
							<span class="input-group-addon">
								<span class="icon icon-lg">
									<i class="fa fa-user"></i>
								</span>
							</span>
						</div>
					</div>

					<div class="form-group mb-lg">
						<div class="clearfix">
							<label class="pull-left">Password</label>
							<a class="modal-with-form pull-right" href="#modalForm">Lost Password?</a>
						</div>
						<div class="input-group input-group-icon">
							<input name="pass" id="password" placeholder="Enter your password" type="password" class="form-control input-lg" />
							<p class="text-danger passwordError"></p>
							<span class="input-group-addon">
								<span class="icon icon-lg">
									<i class="fa fa-lock"></i>
								</span>
							</span>
						</div>
					</div>

					<!--MODAL-->
					<div id="modalForm" class="modal-block modal-block-primary mfp-hide">
						<section class="panel">
							<header class="panel-heading">
								<h2 class="panel-title">Reset Password</h2>
							</header>
							<div class="panel-body">
								<form id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate">

									<div class="form-group">
										<label class="col-sm-1 control-label">Email</label>
										<div class="col-sm-11">
											<input type="email" name="email" class="form-control reset_email" placeholder="Type your email..." required />
											<p class="text-danger email-reset"></p>
										</div>
									</div>

								</form>
							</div>
							<footer class="panel-footer">
								<div class="row">
									<div class="col-md-12 text-right">
										<button class="btn btn-primary in_reset">Submit</button>
										<button class="btn btn-default modal-dismiss">Cancel</button>
									</div>
								</div>
							</footer>
						</section>
					</div>

					<div class="row">
						<div class="col-sm-8">
							<div class="checkbox-custom checkbox-default">
								<!-- <input id="RememberMe" name="rememberme" type="checkbox" />
								<label for="RememberMe">Remember Me</label> -->
							</div>
						</div>
						<div class="col-sm-4 text-right">
							<button type="button" class="btn btn-primary hidden-xs login">Sign In</button>
							<button type="button" class="btn btn-primary btn-block btn-lg visible-xs mt-lg login">Sign In</button>
						</div>
					</div>

					<!-- <span class="mt-lg mb-lg line-thru text-center text-uppercase">
							<span>or</span>
						</span>

						<div class="mb-xs text-center">
							<a class="btn btn-facebook mb-md ml-xs mr-xs">Connect with <i class="fa fa-facebook"></i></a>
							<a class="btn btn-twitter mb-md ml-xs mr-xs">Connect with <i class="fa fa-twitter"></i></a>
						</div> -->
					<!-- <p class="text-center" style="padding-top:20px;">Don't have an account yet? <a href="signup">Sign Up!</a> -->
				</div>
			</div>

			<p class="text-center text-muted mt-md mb-md">&copy;  Copyright 2021. All rights reserved. Yuvakasanga.</p>
		</div>
	</section>
	<!-- end: page -->

	<!--Script.js-->

	<?php include("components/jslinks.php"); ?>
	<script src="source/js/auth_login.js"></script>

</body>

</html>