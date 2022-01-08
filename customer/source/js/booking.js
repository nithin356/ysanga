var starVal = 0;
var fromEditSession = 0;
var unavailableDates = [];
$(document).ready(function () {
  $(".bookLogin").hide();
  $(".bookLoginshow").hide();
  $(".hideme").show();
  $(".hidemeReview").hide();
  $(".bookErrordiv").hide();
  loadServices();
  if (window.location.href.indexOf("uidtrackSessionedit=true") > -1) {
    loadEditServices();
    fromEditSession = 1;
    $(".btnCheckSubmit").val("EDIT");
  }
  if (window.location.href.indexOf("booking.php") > -1) {
    $('#myElement').tooltip().mouseover();
    // $("#submitData").submit();
    // $("#submitData").trigger('submit');
  }
  $("#submitData").submit(function (e) {
    if (getSessionKey()) {
      e.preventDefault();
      var arrival = $(".arrival").val();
      var timeSlot = $("select.timeslot option").filter(":selected").val();
      var toe = $(".toe").val();
      var noa = $("#nameorg").val();
      var others = $("#otherReq").val();
      if (
        arrival == "" ||
        timeSlot == "" ||
        toe == "" ||
        noa == "" ||
        others == ""
      ) {
        $(".bookErrordiv").slideDown().show();
        $(".bookError").html("Please Enter all the details!");
      } else {
        $(".btnCheckSubmit").attr("style", "pointer-events:none;");
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
              // $(".btnCheckSubmit").attr("style", "pointer-events:cursor;");
              $(".clickThisFor").click();
              $(".bookErrordiv").slideDown().hide();
              setTimeout(() => {
                window.location.href = "my-bookings.php";
              }, 3000);
            } else {
              // $(".btnCheckSubmit").attr("style", "pointer-events:cursor;");
              $(".bookErrordiv").slideDown().show();
              $(".bookError").html(jsonData.message);
            }
          },
        });
      }
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
        var icon = "";
        for (var w = 0; w < str_array.length; w++) {
          if (str_array[w].includes("Air")) {
            icon = "fa-fan";
          } else if (str_array[w].includes("Air")) {
            icon = "fa-fan";
          } else {
            icon = "fa-info";
          }
          specs +=
            "<li><i class='fas " + icon + " ' style='height: 45px;width: 45px;line-height: 2.8;background:black;color:white;margin-bottom:10px;'></i><br>" + str_array[w] + "</li> ";
        }
        $(".address").html("Address: " + jsonData.service.addr);
        $(".specs").html("<li><i class='fas fa-chair' style='height: 45px;width: 45px;line-height: 2.8;background:black;color:white;margin-bottom:10px;'></i><br>" + jsonData.service.capacity + " Seats</li>" + specs);
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
          if (jsonData.booking.timeslot == 1) {
            $(".time-slot").html("9:00 AM - 2:30 PM");
          } else {
            $(".time-slot").html("3:00 PM - 9:00 PM");
          }
          $(".toe").val(jsonData.booking.eventtype);

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
