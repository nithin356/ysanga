<!DOCTYPE html>
<html lang="en">
<!-- Head CSS Files -->
<?php include 'lander-components/head.php' ?>
<style type="text/css">
	.owl-nav {
		display: none;
	}
	@keyframes ldio-h7cmfxhg4bf {
        0% {
            transform: rotate(0deg)
        }

        50% {
            transform: rotate(180deg)
        }

        100% {
            transform: rotate(360deg)
        }
    }

    .ldio-h7cmfxhg4bf div {
        position: absolute;
        animation: ldio-h7cmfxhg4bf 1s linear infinite;
        width: 160px;
        height: 160px;
        top: 20px;
        left: 20px;
        border-radius: 50%;
        box-shadow: 0 4px 0 0 #e15b64;
        transform-origin: 80px 82px;
    }

    .loadingio-spinner-eclipse-buzqzyg4ugr {
        width: 200px;
        height: 200px;
        display: inline-block;
        overflow: hidden;
        background: #ffffff;
    }

    .ldio-h7cmfxhg4bf {
        width: 100%;
        height: 100%;
        position: relative;
        transform: translateZ(0) scale(1);
        backface-visibility: hidden;
        transform-origin: 0 0;
        /* see note above */
    }

    .ldio-h7cmfxhg4bf div {
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

		<div class="inn-banner">
			<div class="container">
				<div class="row">
					<h4>Bookings</h4>
					<p>
					<ul>
						<li><a href="index.php">Home</a>
						</li>
						<li><a href="my-bookings.php">Bookings</a>
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
						<h2>My Bookings</h2>
						<div class="head-title">
							<div class="hl-1"></div>
							<div class="hl-2"></div>
							<div class="hl-3"></div>
						</div>
					</div>
					<!--SERVICES SECTION-->
					<div class="col-md-12 myBookingDetails">
						<center>
							<div class="loadingio-spinner-eclipse-buzqzyg4ugr">
								<div class="ldio-h7cmfxhg4bf">
									<div></div>
								</div>
							</div>
						</center>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
	<script src="customer/source/js/user-booking.js"></script>
</body>

</html>