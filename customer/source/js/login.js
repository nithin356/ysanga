$(document).ready(function () {
  //OTP SCREEN
  $(".otpScreen").hide();
  $(".vryBtn").hide();
  $(".loginErrordiv").hide();
  $(".RegErrordiv").slideDown().hide();

  //Login Click
  $("#login").on("click", function () {
    login();
  });

  //Verify Click
  $("#verify").on("click", function () {
    verify();
  });

  //Register
  $("#Rsubmit").on("click", function () {
    register();
  });
});

//Login
function login() {
  $(".loginErrordiv").slideDown().hide();
  var pnum = $("#phone").val();
  if (pnum === "") {
    $(".loginErrordiv").slideDown().show();
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
          $("#timer").html(jsonData.otp);
          console.log(jsonData.otp);
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
  $(".RegErrordiv").slideDown().hide();
  var Remail = $("#Remail").val();
  var Rusername = $("#Rusername").val();
  var Rphno = $("#Rphonenumber").val();
  var Lphone = Rphno.length;
  if (Rusername == "" || Rphno == "" || Remail == "") {
    $(".RegErrordiv").slideDown().show();
    $(".RegError").html("Please fill all the fields!");
  } else if (Lphone != 10) {
    $(".RegErrordiv").slideDown().show();
    $(".RegError").html("Invalid Phone Number!");
  } else {
    $.ajax({
      type: "POST",
      url: API_URL + "customer/registerasotp/",
      data: {
        name: Rusername,
        phone: Rphno,
        email: Remail,
      },
      success: function (response) {
        var jsonData = JSON.parse(response);
        if (jsonData.status === "OK") {
          $(".regClose").click();
          $("#phone").val(Rphno);
          $(".phoneData").hide();
          $("#loginModal").click();
        } else {
          $(".RegErrordiv").slideDown().show();
          $(".RegError").html(jsonData.message);
        }
      },
    });
  }
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
    url: API_URL + "customer/verifyotp/",
    data: {
      phone: pnum,
      otp: otp,
    },
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status === "OK") {
        location.reload();
      } else {
        $(".otp").addClass("bellno");
        setTimeout(() => {
          $(".otp").removeClass("bellno");
          $(".otp").val("");
        }, 1000);
      }
    },
  });
}

//Email Validation
function emailVal() {
  var pattern =
    /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  // var email = $(".userem").val();
  if (Remail.match(pattern)) {
    return true;
  } else {
    return false;
  }
}

//Phone Number VAlidation

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
