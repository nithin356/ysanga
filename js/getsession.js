$(document).ready(function () {
  getSession();
});

function getSession() {
  $.ajax({
    type: "POST",
    url: API_URL + "customer/user-session/",
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status === "OK") {
        $(".logOut").show();
        $(".RegisterSide").hide();
        $(".LoginSide").hide();
        localStorage.setItem("sessionkey", "1");
      } else {
        $(".logOut").hide();
        $(".RegisterSide").show();
        $(".LoginSide").show();
        localStorage.setItem("sessionkey", "0");
      }
    },
  });
}

function getSessionKey() {
  var SessionKey = localStorage.getItem("sessionkey");
  if (SessionKey == 1) {
    return true;
  } else {
    return false;
  }
}
