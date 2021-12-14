<!doctype html>
<html class="fixed">

<head>
	<!--Style.css-->
	<?php include("components/csslinks.php"); ?>
</head>

<body>
	<!-- start: page -->
	<section class="body-sign">
		<div class="center-sign">
			<a href="/" class="logo pull-left">
				<img src="../admin-assets/images/cdek.png" height="54" alt="Porto Admin" />
			</a>

			<div class="panel panel-sign">
				<div class="panel-title-sign mt-xl text-right">
					<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign Up</h2>
				</div>
				<div class="panel-body">
					<form method="POST">
						<div class="form-group mb-lg">
							<label>Full Name</label>
							<input name="name" type="text" placeholder="Enter your name" class="form-control input-lg in_name" />
							<p class="nmmsg text-danger"></p>
						</div>

						<div class="form-group mb-lg">
							<label>E-mail Address</label>
							<input name="email" type="email"  placeholder="Enter your email"  class="form-control input-lg in_email" />
							<p class="emmsg emailError text-danger"></p>
						</div>
						<div class="form-group mb-lg">
							<label>Phone</label>
							<input name="phone" type="text" placeholder="Enter your phone" class="form-control input-lg in_phone " />
							<p class="mnmsg text-danger phoneerror"></p>
						</div>

						<div class="form-group mb-none">
							<div class="row">
								<div class="col-sm-6 mb-lg">
									<label>Password</label>
									<input name="pass" type="password" placeholder="Enter your Password" class="form-control input-lg in_pass" />
								</div>
								<div class="col-sm-6 mb-lg">
									<label>Password Confirmation</label>
									<input name="pwd_confirm"  type="password" placeholder="Enter Confirm Password" class="form-control input-lg in_cpass" />
									<p class="cpwmsg text-danger"></p>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-8">
								<!-- <div class="checkbox-custom checkbox-default">
									<input id="AgreeTerms" name="agreeterms" type="checkbox" />
									<label for="AgreeTerms">I agree with <a href="#">terms of use</a></label>
								</div> -->
							</div>
							<div class="col-sm-4 text-right">
								<button type=button class="btn btn-primary hidden-xs bt_sub">Sign Up</button>
								<button type=button class="btn btn-primary btn-block btn-lg visible-xs mt-lg bt_sub">Sign Up</button>
							</div>
						</div>

						<!-- <span class="mt-lg mb-lg line-thru text-center text-uppercase">
							<span>or</span>
						</span>

						<div class="mb-xs text-center">
							<a class="btn btn-facebook mb-md ml-xs mr-xs">Connect with <i class="fa fa-facebook"></i></a>
							<a class="btn btn-twitter mb-md ml-xs mr-xs">Connect with <i class="fa fa-twitter"></i></a>
						</div> -->

						<p class="text-center" style="padding-top:20px;">Already have an account? <a href="login">Sign In!</a>

					</form>
				</div>
			</div>

			<p class="text-center text-muted mt-md mb-md">&copy;  Copyright 2021. All rights reserved. Yuvakasanga.</p>
		</div>
	</section>
	<!-- end: page -->

	<!--Script.js-->
	
	<?php include("components/jslinks.php");?>
	<script src="source/js/admin_script.js"></script>

</body>

</html>