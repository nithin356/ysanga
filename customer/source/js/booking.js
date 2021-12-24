var starVal = 0;
$(document).ready(function () {
  $(".hideme").show();

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
        for (var i = 0; i < jsonData.service.img.length; i++) {
          res +=
            "<div class='item'><img class='img-responsive' src='uploads/" +
            jsonData.service.img[i].oimg +
            "'/></div>";
          $(".photoservice").append(
            '<li><img class="materialboxed" data-caption=" " src="uploads/' +
              jsonData.service.img[i].oimg +
              '" alt=""></li>'
          );
        }
        var array = jsonData.service.specs;
        var str_array = array.split(",");
        var specs = "";
        for (var w = 0; w < str_array.length; w++) {
          specs +=
            "<li><img src='images/icon/a1.png'>" + str_array[w] + "</li> ";
        }
        $(".address").html("Address: " + jsonData.service.addr);
        $(".specs").html(specs);
        $("#content").html('<div id="carousel-section">' + res + "</div>");
        $("#carousel-section").addClass("owl-carousel");
        $("#carousel-section").owlCarousel({
          items: 1,
          slideBy: 1,
          stagePadding: 0,
          nav: true,
          dots: false,
        });
        //Review
        $(".reviewdata").empty();
        $(".myReview").empty();
        $(".hideme").hide();
        $(".materialboxed").materialbox();
        $(".reviewdata").html(
          "<span>" +
            jsonData.service.resultReview +
            '<i class="fa fa-star" aria-hidden="true"></i></span>based on ' +
            jsonData.service.creview +
            " reviews</label>"
        );

        var review = "";
        for (var i = 0; i < jsonData.service.review.length; i++) {
          var date = jsonData.service.review[i].date;
          date = date.substring(0, date.length - 2);
          const timestamp = moment(date).fromNow();
          review +=
            '<li><div class="lr-user-wr-img"> <img src="images/users/2.png" alt=""> </div><div class="lr-user-wr-con lr-user-wr-con-block"><h6>' +
            jsonData.service.review[i].uname +
            " <span>" +
            jsonData.service.review[i].stars +
            '<i class="fa fa-star" aria-hidden="true"></i></span></h6> <span class="lr-revi-date">' +
            timestamp +
            "</span><p>" +
            jsonData.service.review[i].review +
            "</p></div></li>";
        }
        $(".myReview").html(review);
      } else {
      }
    },
  });
}

function audreview() {
  $(".reviewdata").empty();
  $(".myReview").empty();
  $(".hideme").show();

  $.ajax({
    type: "POST",
    url: API_URL + "customer/service/",
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status === "OK") {
        $(".hideme").hide();

        $(".reviewdata").html(
          "<span>" +
            jsonData.service.resultReview +
            '<i class="fa fa-star" aria-hidden="true"></i></span>based on ' +
            jsonData.service.creview +
            " reviews</label>"
        );

        var review = "";
        for (var i = 0; i < jsonData.service.review.length; i++) {
          var date = jsonData.service.review[i].date;
          date = date.substring(0, date.length - 2);
          const timestamp = moment(date).fromNow();
          review +=
            '<li><div class="lr-user-wr-img"> <img src="images/users/2.png" alt=""> </div><div class="lr-user-wr-con lr-user-wr-con-block"><h6>' +
            jsonData.service.review[i].uname +
            " <span>" +
            jsonData.service.review[i].stars +
            '<i class="fa fa-star" aria-hidden="true"></i></span></h6> <span class="lr-revi-date">' +
            timestamp +
            "</span><p>" +
            jsonData.service.review[i].review +
            "</p></div></li>";
        }
        $(".myReview").html(review);
      } else {
      }
    },
  });
}

function myStar(val) {
  starVal = val;
}

function submitReview() {
  var rdata = $(".myReviewData").val();
  $.ajax({
    type: "POST",
    url: API_URL + "customer/submitreview/",
    data: {
      review: rdata,
      star: starVal,
    },
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status === "OK") {
        starVal = 0;
        $(".myReviewData").val("");
        $(".pop-close").click();
        audreview();
      } else {
      }
    },
  });
}
