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
            <i class="fa fa-user mr-xs"></i> Verify OTP
          </h2>
        </div>
        <div class="panel-body">
          <div class="alert alert-info">
            <p class="m-none text-semibold h6">
              OTP has sent to your registered mobile number!
            </p>
          </div>

          <form>
            <div class="form-group">
              <div class="col-sm-12">
                <input type="text" name="votp" class="form-control votp" placeholder="Enter One Time Password" required />
                <p class="text-danger errcpass"></p>
              </div>
            </div>
            <div class="col-sm-12 text-right">
              <button type="button" class="btn btn-primary hidden-xs reset_pass">VERIFY</button>
              <button type="button" class="btn btn-primary btn-block btn-lg visible-xs mt-lg reset_pass">VERIFY</button>
            </div>
            </br>
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
</body>

</html>