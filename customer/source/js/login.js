$(document).ready(function () {
  //OTP SCREEN
  $(".otpScreen").hide();
  $(".vryBtn").hide();
  $(".loginErrordiv").hide();

  //Login Click
  $("#login").on("click", function () {
    login();
  });

  //Verify Click
  $("#verify").on("click", function () {
    verify();
  });
});

//Login
function login() {
  $(".loginErrordiv").slideDown().hide();
  var pnum = $("#phone").val();
  if (pnum === "") {
    $(".loginError").html("Please fill all the fields!");
  } else {
    $.ajax({
      type: "POST",
      url: API_URL + "customer/loginasotp/",
      data: {
        phone: pnum,
      },
      success: function (response) {
        var jsonData = JSON.parse(response);
        if (jsonData.status === "OK") {
          $(".otpScreen").slideDown().show();
          $(".lgnBtn").slideDown().hide();
          $(".phoneField").slideDown().hide();
          $(".vryBtn").slideDown().show();
        } else {
          $(".loginError").html(jsonData.message);
          $(".loginErrordiv").slideDown().show();
          $(".phoneField").slideDown().show();
          $(".otpScreen").slideDown().hide();
          $(".vryBtn").slideDown().hide();
          $(".lgnBtn").slideDown().show();
        }
      },
    });
  }
}

//Register
function register() {
  var Rusername = $("#Rusername").val();
  var Remail = $("#Remail").val();
  var Rpassword = $("#Rpswd").val();
  var RCpassword = $("#Rcpswd").val();
}

//Verify
function verify() {
  var pnum = $("#phone").val();
  var otp = $(".otp")
    .map((_, el) => el.value)
    .get()
    .toString();
  otp = otp.replaceAll(",", "");
  $.ajax({
    type: "POST",
    url: API_URL + "customer/verifyotp",
    data: {
      phone: pnum,
      otp: otp,
    },
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status === "OK") {
        alert("otp");
      } else {
        alert("ostp");
      }
    },
  });
}

//OTP registration
let digitValidate = function (ele) {
  ele.value = ele.value.replace(/[^0-9]/g, "");
};

let tabChange = function (val) {
  let ele = document.getElementsByClassName("otp");
  if (ele[val - 1].value != "") {
    ele[val].focus();
  } else if (ele[val - 1].value == "") {
    ele[val - 2].focus();
  }
};
