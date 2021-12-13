$(document).ready(function () {
  //Sidebar
  $(".side-bar-close").click(function () {
    $(".hide-menu").click();
  });
  //Services
  $(".services").click(function () {
    var sid = $(this).attr("data-service");
    $.ajax({
      type: "POST",
      url: API_URL + "customer/service-session/",
      data: {
        sid: sid,
      },
      success: function (response) {
        var jsonData = JSON.parse(response);
        if (jsonData.status === "OK") {
          window.location.href = "booking.php";
        } else {
          // alert(sid);
          // alert(jsonData.message);
        }
      },
    });
  });
});
