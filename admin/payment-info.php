<!doctype html>
<html class="fixed">

<head>
	<!--csslinks-->
	<?php include "components/csslinks.php"; ?>
</head>

<body>
	<section class="body">

		<!-- start: header -->
		<?php include "components/header.php"; ?>
		<!-- end: header -->

		<div class="inner-wrapper">
			<!-- start: sidebar -->
			<?php include "components/sidebar.php"; ?>
			<!-- end: sidebar -->

			<section role="main" class="content-body">
				<!--Header-->
				<?php include "components/header2.php"; ?>
				<!--end header-->

				<!-- start: page -->
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="row">
								<div class="col-xs-12" style="overflow-x: scroll; overflow-y: hidden;">
									<table class="table paymenttable table-bordered table-hover dt-responsive">
										<thead>
											<tr>
												<th>User Name</th>
												<th>RazorPay ID</th>
												<th>Email</th>
												<th>Auditorium</th>
												<th>Amount</th>
												<th>Created</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>
		<!-- end: page -->
	</section>
	</div>
	</section>
	<!--Script.js-->
	<?php include "components/jslinks.php"; ?>
	<script src="source/js/admin_profile.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
	<script src="source/js/get_paymentinfo.js"></script>
</body>

</html>