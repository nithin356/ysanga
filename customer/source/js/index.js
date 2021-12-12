$(document).ready(function () {
  //Sidebar
  $(".side-bar-close").click(function () {
    $(".hide-menu").click();
  });
  //Services
  $(".services").click(function () {
    $.ajax({
      type: "POST",
      url: API_URL + "customer/service-session/",
      data: {
        sid: $(this).attr("data-service"),
      },
      success: function (response) {
        var jsonData = JSON.parse(response);
        if (jsonData.status === "OK") {
          window.href.location = "booking.php";
        } else {
        }
      },
    });
  });
});
