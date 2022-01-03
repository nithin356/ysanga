var starVal = 0;
var fromEditSession = 0;
$(document).ready(function () {
  $(".hideme").show();
  $(".hidemeReview").hide();
  loadServices();
  if (window.location.href.indexOf("uidtrackSessionedit=true") > -1) {
    loadEditServices();
    fromEditSession = 1;
    $(".btnCheckSubmit").val("EDIT");
  }
  $("#submitData").submit(function (e) {
    if (getSessionKey()) {
      e.preventDefault();
      var arrival = $(".arrival").val();
      var timeSlot = $("select.timeslot option").filter(":selected").val();
      var toe = $("select.toe option").filter(":selected").val();
      var noa = $("#nameorg").val();
      var others = $("#otherReq").val();
    
      $.ajax({
        type: "POST",
        url: API_URL + "customer/checking/",
        data: {
          arrival: arrival,
          timeSlot: timeSlot,
          toe: toe,
          noa: noa,
          others: others,
          edit: fromEditSession,
        },
        success: function (response) {
         

          var jsonData = JSON.parse(response);
          if (jsonData.status === "OK") {
            $(".clickThisFor").click();
          } else {
            alert(jsonData.message);
          }
        },
      });
    } else {
      $("#loginModal").click();
    }
  });
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
          jsonData.service.sdesc +
            "<br><span class='room-price-1' style='color:white;'>Price : ₹" +
            jsonData.service.price +
            "</span>"
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
        $(".hidemeReview").show();
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
  if (getSessionKey()) {
    $(".hidemeReview").hide();
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
          $(".hidemeReview").show();
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
  } else {
    $("#loginModal").click();
  }
}

function myStar(val) {
  starVal = val;
}

function submitReview() {
  if (getSessionKey()) {
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
  } else {
    $("#loginModal").click();
  }
}

function loadEditServices() {
  if (getSessionKey()) {
    $.ajax({
      type: "POST",
      url: API_URL + "customer/booking-session/",
      success: function (response) {
        var jsonData = JSON.parse(response);
        if (jsonData.status === "OK") {
          $(".aData").hide();
          $(".arrival").val(jsonData.booking.arrival);
          $(".timeslot")
            .find("option[value=" + jsonData.booking.timeslot + "]")
            .attr("selected", "selected");
          $(".toe")
            .find("option[value=" + jsonData.booking.eventtype + "]")
            .attr("selected", "selected");
          if (jsonData.booking.timeslot == 1) {
            $(".time-slot").html("9:00 AM - 2:30 PM");
          } else {
            $(".time-slot").html("3:00 PM - 9:00 PM");
          }
          $(".event-slot").html(jsonData.booking.eventtype);

          $("#nameorg").val(jsonData.booking.org);
          $("#otherReq").val(jsonData.booking.other);
        } else {
        }
      },
    });
  } else {
    $("#loginModal").click();
  }
}