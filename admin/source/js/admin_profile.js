$(document).ready(function () {
  loadProfile();
  $(".profile_btn").click(function (e) {
    e.preventDefault();
    updateprofile();
  });
});

function loadProfile() {
  $.ajax({
    type: "POST",
    url: "source/profile.php",
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status === "error") {
        //alert(jsonData.message);
      } else {
        $(".profileFulname").val(jsonData.data.name);
        $(".profilePhone").val(jsonData.data.phone);
        $(".profileEmail").val(jsonData.data.email);
        $(".name").html(jsonData.data.name);
        $(".profileOldPassword").val("");
        $(".profileNewPassword").val("");
        $(".profilePasswordRepeat").val("");
        if (window.location.toString().indexOf("index") != -1) {
          $(".bread-crumbs").html("Dashboard");
        } else if (window.location.toString().indexOf("profile") != -1) {
          $(".bread-crumbs").html("My Profile");
        }
      }
    },
  });
}

function updateprofile() {
  var name = $(".profileFulname").val();
  var email = $(".profileEmail").val();
  var phone = $(".profilePhone").val();
  var oldpass = $(".profileOldPassword").val();
  var newpass = $(".profileNewPassword").val();
  var confirmpass = $(".profilePasswordRepeat").val();
  if (
    name === "" ||
    email === "" ||
    phone === "" ||
    oldpass === "" ||
    newpass === "" ||
    confirmpass === ""
  ) {
    swal("Warning!", "Please fill all the fields!", "warning");
  } else {
    alert("else");
    $.ajax({
      type: "POST",
      url: "source/updateadminprofile.php",
      data: {
        name: name,
        email: email,
        phone: phone,
        oldpass: oldpass,
        newpass: newpass,
        confirmpass: confirmpass,
      },
      success: function (response) {
        var jsonData = JSON.parse(response);
        if (jsonData.status === "error") {
          alert(jsonData.message);
          // $(".passwordError").html(jsonData.message);
          // $("#id").val("");
        } else if (jsonData.status === "success") {
          alert(jsonData.message);
          loadProfile();
        }
      },
    });
  }
}
