var starVal = 0;
var fromEditSession = 0;
var unavailableDates = [];
var timeSlotval = 0;
$(document).ready(function () {
  $(".bookLogin").hide();
  $(".bookLoginshow").hide();
  $(".hideme").show();
  $(".hidemeReview").hide();
  $(".bookErrordiv").hide();
  loadServices();
  $(".timeSlotVal").click(function () {
    timeSlotval = $(this).attr("value");
    $(".btnDrop").html($(this).text());
  });
  if (window.location.href.indexOf("uidtrackSessionedit=true") > -1) {
    loadEditServices();
    fromEditSession = 1;
    $(".btnCheckSubmit").val("EDIT");
  }
  if (window.location.href.indexOf("booking.php") > -1) {
    $("#myElement").tooltip().mouseover();
    // $("#submitData").submit();
    // $("#submitData").trigger('submit');
  }
  $("#submitData").submit(function (e) {
    if (getSessionKey()) {
      e.preventDefault();
      var arrival = $(".arrival").val();
      var timeSlot = timeSlotval;
      var toe = $(".toe").val();
      var noa = $("#nameorg").val();
      var others = $("#otherReq").val();
      if (
        arrival == "" ||
        timeSlot == 0 ||
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
        $(".containers").show();
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
          if (str_array[w].toLowerCase().includes("air")) {
            icon = "fa-fan";
          } else if (str_array[w].toLowerCase().includes("speaker")) {
            icon = "fa-volume-up";
          } else if (str_array[w].toLowerCase().includes("mic")) {
            icon = "fa-microphone-alt";
          } else if (str_array[w].toLowerCase().includes("audio")) {
            icon = "fa-headphones-alt";
          } else if (str_array[w].toLowerCase().includes("light")) {
            icon = "fa-lightbulb";
          } else {
            icon = "fa-info";
          }
          specs +=
            "<li><i class='fas " +
            icon +
            " ' style='height: 45px;width: 45px;line-height: 2.8;background:black;color:white;margin-bottom:10px;'></i><br>" +
            str_array[w] +
            "</li> ";
        }
        $(".address").html("Address: " + jsonData.service.addr);
        $(".specs").html(
          "<li><i class='fas fa-chair' style='height: 45px;width: 45px;line-height: 2.8;background:black;color:white;margin-bottom:10px;'></i><br>" +
            jsonData.service.capacity +
            " Seats</li>" +
            specs
        );
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
        if (jsonData.service.creview > 0) {
          rdata =
            "<span>" +
            jsonData.service.resultReview +
            '<i class="fa fa-star" aria-hidden="true"></i></span>based on ' +
            jsonData.service.creview +
            " reviews";
        } else {
          rdata = "<span>No Reviews</span>";
        }
        $(".reviewdata").html(rdata);
        $(".hidemeReview").show();
        var review = "";
        for (var i = 0; i < jsonData.service.review.length; i++) {
          var date = jsonData.service.review[i].date;
          date = date.substring(0, date.length - 2);
          const timestamp = moment(date).fromNow();
          review +=
            '<li><div class="lr-user-wr-img" style="background:blue;color:white;height:50px;width:50px;line-height: 1.8;font-size: 28px;font-weight: bolder;padding-left: 2%;">' +
            jsonData.service.review[i].uname[0] +
            '</div><div class="lr-user-wr-con lr-user-wr-con-block"><h6>' +
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
          var rdata = "";
          if (jsonData.service.creview > 0) {
            rdata =
              "<span>" +
              jsonData.service.resultReview +
              '<i class="fa fa-star" aria-hidden="true"></i></span>based on ' +
              jsonData.service.creview +
              " reviews";
          } else {
            rdata =
              '<span>No Review Found<i class="fa fa-star" aria-hidden="true"></i></span>';
          }
          $(".reviewdata").html(rdata);

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
          if (jsonData.booking.timeslot == 1) {
            timeSlotval = 1;
            $(".btnDrop").html("9:00 AM - 2:30 PM");
          } else if (jsonData.booking.timeslot == 2) {
            timeSlotval = 2;
            $(".btnDrop").html("3:00 PM - 9:00 PM");
          } else if (jsonData.booking.timeslot == 3) {
            timeSlotval = 3;
            $(".btnDrop").html("3:00 PM - 9:00 PM");
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

function unavailable(date) {
  dmy = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();
  if ($.inArray(dmy, unavailableDates) == -1) {
    return [true, ""];
  } else {
    return [false, "", "Unavailable"];
  }
}

var msg = "";
$("#from").click(function () {
  msg =
    "<div class='tabledata' style='margin-top:5px;'><span><i style='border-radius: 1px;border:1px solid #000!important;color:#fff;background:#fff;padding-left:5px;font-size:9px;'>B&nbsp;</i></span> Available&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><i style='border-radius: 1px;border:1px solid #000!important;color:#fa1515;background:#fa1515;padding-left:5px;font-size:9px;'>B</i></span> Booked&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>";
  $('.ui-datepicker-unselectable[title="Unavailable"]')
    .find("span")
    .removeClass("ui-state-default")
    .addClass("colorData");
  $(".tabledata").remove();
  $("table").after(msg);
  msg = "";
});

function getBookdate(e) {
  var date = $(e).val();
  $.ajax({
    type: "POST",
    url: API_URL + "customer/bookingdate/",
    data: {
      date: date,
    },
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status === "OK") {
        $(".succeShow").hide();
        for (var i = 0; i < 3; i++) {
          $('.timeSlotVal[value="' + i + '"]').show();
        }
        for (var i = 0; i < jsonData.slot.length; i++) {
          $('.timeSlotVal[value="' + jsonData.slot[i].time + '"]').hide();
        }
        $('.timeSlotVal[value="3"]').hide();
        if (jsonData.slot.length >= 2) {
          $(".succeShow").show();
          $(".succeShow").html("Not Available");
        }
        if (jsonData.slot.length == 0) {
          for (var i = 1; i < 4; i++) {
            $('.timeSlotVal[value="' + i + '"]').show();
          }
        }
      } else {
        $(".succeShow").hide();
        for (var i = 1; i < 4; i++) {
          $('.timeSlotVal[value="' + i + '"]').show();
        }
      }
    },
  });
}
