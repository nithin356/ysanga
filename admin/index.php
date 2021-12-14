<!doctype html>
<html class="fixed">

<head>
	<!--csslinks-->
	<?php include("components/csslinks.php"); ?>
</head>

<body>
	<section class="body">

		<!-- start: header -->
		<?php include("components/header.php"); ?>
		<!-- end: header -->

		<div class="inner-wrapper">
			<!-- start: sidebar -->
			<?php include("components/sidebar.php"); ?>
			<!-- end: sidebar -->

			<section role="main" class="content-body">
				<!--Header-->
				<?php include("components/header2.php"); ?>
				<!--end header-->


				<!-- start: page -->
				<div class="row">
					<div class="col-md-6 col-lg-12 col-xl-6">
						<div class="row">
							<div class="col-md-12 col-lg-6 col-xl-6">
								<section class="panel panel-featured-left panel-featured-primary">
									<div class="panel-body">
										<div class="widget-summary">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-primary">
													<i class="fa fa-users"></i>
												</div>
											</div>
											<div class="widget-summary-col">
												<div class="summary">
													<h4 class="title">Total Vendors</h4>
													<div class="info">
														<strong class="amount venamt">loading...</strong>
														<span class="text-primary">(<span class="amount onholdac text-danger"></span>On Hold)</span>
													</div>
												</div>
												<div class="summary-footer">
													<a href="viewvendors" class="text-muted text-uppercase">(View Vendors)</a>
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
							<div class="col-md-12 col-lg-6 col-xl-6">
								<section class="panel panel-featured-left panel-featured-primary">
									<div class="panel-body">
										<div class="widget-summary">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-primary">
													<i class="fa fa-user"></i>
												</div>
											</div>
											<div class="widget-summary-col">
												<div class="summary">
													<h4 class="title">Total Resellers</h4>
													<div class="info">
														<strong class="amount renamt">loading...</strong>
														<span class="text-primary">(<span class="amount onholdrac text-danger"></span>On Hold)</span>
													</div>
												</div>
												<div class="summary-footer">
													<a href="view-reseller" class="text-muted text-uppercase">(View Resellers)</a>
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
							<div class="col-md-12 col-lg-6 col-xl-6">
								<section class="panel panel-featured-left panel-featured-secondary">
									<div class="panel-body">
										<div class="widget-summary">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-secondary">
													<i class="fa fa-tag"></i>
												</div>
											</div>
											<div class="widget-summary-col">
												<div class="summary">
													<h4 class="title">Total Products</h4>
													<div class="info">
														<strong class="amount tproducts">loading...</strong>
													</div>
												</div>
												<div class="summary-footer">
													<a href="viewProducts" class="text-muted text-uppercase">(View Products)</a>
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
							<div class="col-md-12 col-lg-6 col-xl-6">
								<section class="panel panel-featured-left panel-featured-tertiary">
									<div class="panel-body">
										<div class="widget-summary">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-tertiary">
													<i class="fa fa-shopping-cart"></i>
												</div>
											</div>
											<div class="widget-summary-col">
												<div class="summary">
													<h4 class="title">Total Orders payments</h4>
													<div class="info">
														<strong class="amount ordcount">loading...</strong>
													</div>
												</div>
												<div class="summary-footer">
													<a href="payment-info" class="text-muted text-uppercase">(statement)</a>
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
							
						</div>
					</div>
				</div>
				<!-- end: page -->
			</section>
		</div>
	</section>
	<!--Script.js-->
	<?php include("components/jslinks.php"); ?>
	<script src="source/js/admin_profile.js"></script>
	<script src="source/js/dashboard.js"></script>
</body>

</html>