$(document).ready(function () {
  $("#owl-example").owlCarousel({
    navigation: true,
    slideSpeed: 300,
    paginationSpeed: 400,
    singleItem: true,
    pagination: false,
    rewindSpeed: 500,
  });
  loadService();
});
function loadService() {
  $.ajax({
    type: "POST",
    url: API_URL + "customer/service/",
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status === "OK") {
        var res = "";
        for (var i = 0; i < jsonData.service.img.length; i++) {
          res +=
            "<div class='item'><img class='img-responsive' src='uploads/"+jsonData.service.img[i].oimg+"'/></div>";
        }
        $("#content").html('<div id="carousel-section">' + res + "</div>");
        $("#carousel-section").addClass("owl-carousel");
        $("#carousel-section").owlCarousel({
          items: 1,
          slideBy: 1,
          stagePadding: 0,
          nav: true,
          dots: false,
        });
      } else {
      }
    },
  });
}
