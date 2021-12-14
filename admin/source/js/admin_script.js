$(document).ready(function () {
  $(".bt_sub").click(function () {
    validate();
  });

  $(".in_name").change(function () {
    if (!valName()) {
      $(".nmmsg").text("Name can have only Alphabets");
    } else {
      $(".nmmsg").text("");
    }
  });
  $(".in_phone").change(function () {
    if (!valPhone()) {
      $(".mnmsg").text("This field can have only 10 numbers");
    } else {
      $(".mnmsg").text("");
    }
  });

  $(".in_pass").change(function () {
    if (!valPass()) {
      $(".pwmsg").text("This field must have atleast 8 characters");
    } else {
      $(".pwmsg").text("");
    }
  });

  $(".in_cpass").change(function () {
    if (!valCPass()) {
      $(".cpwmsg").text("Confirm Password does not match Password");
    } else {
      $(".cpwmsg").text("");
    }
  });

  $(".in_email").change(function () {
    if (!valEmail()) {
      $(".emmsg").text("Invalid Email");
    } else {
      $(".emmsg").text("");
    }
  });
});
function valName() {
  var name = $(".in_name").val();
  var letters = /^[A-Za-z\s]+$/;
  if (name.match(letters)) {
    return true;
  } else {
    return false;
  }
}

function valPhone() {
  var pattern = /^[0-9]+$/;
  var phone = $(".in_phone").val();
  if (phone.match(pattern) && phone.length == 10) {
    return true;
  } else {
    return false;
  }
}

function valEmail() {
  var pattern = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
  var email = $(".in_email").val();
  if (email.match(pattern)) {
    return true;
  } else {
    return false;
  }
}

function valPass() {
  var pass = $(".in_pass").val();
  if (pass.length < 8) {
    return false;
  } else {
    return true;
  }
}

function valCPass() {
  var cpass = $(".in_cpass").val();
  var pass = $(".in_pass").val();
  if (pass == cpass) {
    return true;
  } else {
    return false;
  }
}

function validate() {
  var name = $(".in_name").val();
  var phone = $(".in_phone").val();
  var email = $(".in_email").val();
  var pass = $(".in_pass").val();
  var cpass = $(".in_cpass").val();
  if (
    name === "" ||
    phone === "" ||
    email === "" ||
    pass === "" ||
    cpass === ""
  ) {
    swal("Warning!", "Please fill all the fields!", "warning");
  } else if (!valName()) {
    swal("Warning!", "Name field can have only Alphabets!", "warning");
  } else if (!valPhone()) {
    swal("Warning!", "Phone field can have only 10 numbers!", "warning");
  } else if (!valPass()) {
    swal(
      "Warning!",
      "Password should contain atleast 8 characters!",
      "warning"
    );
  } else if (!valCPass()) {
    swal("Warning!", "Password and Confirm Password should match!", "warning");
  } else if (!valEmail()) {
    swal("Warning!", "Invalid Email Id!", "warning");
  } else {
    $.ajax({
      type: "POST",
      url: "source/signup.php",
      data: {
        name: name,
        phone: phone,
        email: email,
        pass: pass,
      },
      success: function (response) {
        var jsonData = JSON.parse(response);
        if (jsonData.status === "error") {
          $(".emailError").html(jsonData.message);
        } else if (jsonData.status === "errorphone") {
          $(".phoneerror").html(jsonData.message);
        } else if (jsonData.status === "success") {
          window.location = "login";
        }
      },
    });
  }
}
