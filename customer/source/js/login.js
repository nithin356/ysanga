$(document).ready(function () {
  //OTP SCREEN
  $(".otpScreen").hide();

  $("#login").on("click", function () {
    login();
  });

  $("#Rgstr").on("click", function () {
    register();
  });
});
//login
function login() {
  var pnum = $("#phone").val();
  if (pnum === "") {
    swal("Warning!", "Please fill all the fields!", "warning");
  } else {
    $.ajax({
      type: "POST",
      url: API_URL + "customer/loginasotp",
      data: {
        phone: pnum,
      },
      success: function (response) {
        var jsonData = JSON.parse(response);
        if (jsonData.status === "OK") {
          $(".otpScreen").slideDown().show();
        } else {
          $(".otpScreen").slideDown().hide();
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

let digitValidate = function (ele) {
  console.log(ele.value);
  ele.value = ele.value.replace(/[^0-9]/g, "");
};

let tabChange = function (val) {
  let ele = document.querySelectorAll("input");
  if (ele[val - 1].value != "") {
    ele[val].focus();
  } else if (ele[val - 1].value == "") {
    ele[val - 2].focus();
  }
};
