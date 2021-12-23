<!doctype html>
<html class="fixed">

<head>
	<!--csslinks-->
	<!-- Basic -->
<meta charset="UTF-8">

<title>Yuvakasanga</title>
<meta name="keywords" content="Yuvakasanga" />
<meta name="description" content="Yuvakasanga">
<meta name="author" content="Yuvakasanga">
<link rel="shortcut icon" type="image/x-icon" href="../lander-assets/images/logo/favi.png">
<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<!-- Web Fonts  -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

<!-- Vendor CSS -->
<link rel="stylesheet" href="../admin-assets/vendor/bootstrap/css/bootstrap.css" />
<link rel="stylesheet" href="../admin-assets/vendor/font-awesome/css/font-awesome.css" />
<link rel="stylesheet" href="../admin-assets/vendor/magnific-popup/magnific-popup.css" />
<link rel="stylesheet" href="../admin-assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

<!-- Specific Page Vendor CSS -->
<link rel="stylesheet" href="../admin-assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
<link rel="stylesheet" href="../admin-assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
<link rel="stylesheet" href="../admin-assets/vendor/morris/morris.css" />

<!-- Theme CSS -->
<link rel="stylesheet" href="../admin-assets/stylesheets/theme.css" />

<!-- Skin CSS -->
<link rel="stylesheet" href="../admin-assets/stylesheets/skins/default.css" />

<!-- Theme Custom CSS -->
<link rel="stylesheet" href="../admin-assets/stylesheets/theme-custom.css">

<!-- Theme Sweetalert CSS -->
<link rel="stylesheet" href="../admin-assets/stylesheets/sweetalert2.min.css">

<!-- Vendor datatables-->
<link rel="stylesheet" href="../admin-assets/stylesheets/bootstrap-toggle.min.css" >
<link rel="stylesheet" type="text/css" href="../admin-assets/stylesheets/jquery.dataTables.css">
<!-- Head Libs -->
<script src="../admin-assets/vendor/modernizr/modernizr.js"></script>
<link rel="stylesheet" href="../admin-assets/stylesheets/file-upload.css">

<style>
.toggle label {
    border-left-color: #fff;
    color: #fff;
}
</style>
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