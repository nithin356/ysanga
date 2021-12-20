$(document).ready(function () {
  if (getSessionKey()) {
    loadServices();
  } else {
    $("#loginModal").click();
  }
});

function loadServices() {
  $.ajax({
    type: "POST",
    url: API_URL + "customer/service/",
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status === "OK") {
        $(".serviceName").html(jsonData.service.sname);
        $(".serviceSdesc").html(
          "CAPACITY: " +
            jsonData.service.capacity +
            ", PRICE: " +
            jsonData.service.price +
            ", " +
            jsonData.service.sdesc +
            ""
        );
        $(".serviceLdesc").html(jsonData.service.ldesc);
        $(".servicePhone").html(jsonData.service.phone);
        $(".hrefCall").attr("href", "tel:" + jsonData.service.phone);
        var res = "";
        res +=
          "<div class='item'><img class='img-responsive' src='uploads/" +
          jsonData.service.cimg +
          "'/></div>";
        $("#content").html('<div id="carousel-section">' + res + "</div>");
        $("#carousel-section").addClass("owl-carousel");
        $("#carousel-section").owlCarousel({
          items: 1,
          slideBy: 1,
          stagePadding: 0,
          nav: true,
          dots: false,
        });
        for (var i = 0; i < jsonData.service.img.length; i++) {
          $(".photoservice").append(
            '<li><img class="materialboxed" data-caption=" " src="uploads/' +
              jsonData.service.img[i].oimg +
              '" alt=""></li>'
          );
        }
        $(".materialboxed").materialbox();
      } else {
      }
    },
  });
}
