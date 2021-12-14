<!DOCTYPE html>
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
        <img src="../admin-assets/images/cdek.png" height="54" alt="Porto Admin" />
      </a>

      <div class="panel panel-sign">
        <div class="panel-title-sign mt-xl text-right">
          <h2 class="title text-uppercase text-bold m-none">
            <i class="fa fa-user mr-xs"></i> Recover Password
          </h2>
        </div>
        <div class="panel-body">
          <div class="alert alert-info">
            <p class="m-none text-semibold h6">
              Enter a new password to sign in!
            </p>
          </div>

          <form>
            <div class="form-group">
              <div class="col-sm-12">
                <input type="password" name="npassword" class="form-control n_pass" placeholder="Enter New Password" required />
                <p class="text-danger errnpass"></p>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <input type="password" name="cpassword" class="form-control c_pass" placeholder="Confirm New Password" required />
                <p class="text-danger errcpass"></p>
              </div>
            </div>
            <div class="col-sm-12 text-right">
              <button type="button" class="btn btn-primary hidden-xs reset_pass">Reset</button>
              <button type="button" class="btn btn-primary btn-block btn-lg visible-xs mt-lg reset_pass">Reset</button>
            </div>
            </br>
            <p class="text-center mt-lg">
              Remembered? <a href="pages-signin.html">Sign In!</a>
            </p>
          </form>
        </div>
      </div>

      <p class="text-center text-muted mt-md mb-md">
        &copy;  Copyright 2021. All rights reserved. Yuvakasanga</a>.
      </p>
    </div>
  </section>
  <!-- end: page -->

  <!--Script.js-->
  <?php include("components/jslinks.php"); ?>
	<script src="source/js/auth_login.js"></script>
</body>

</html>