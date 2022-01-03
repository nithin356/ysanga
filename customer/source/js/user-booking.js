$(document).ready(function () {
  if (getSessionKey()) {
    loadBooking();
  } else {
    $("#loginModal").click();
  }
});

function loadBooking() {
  $.ajax({
    type: "POST",
    url: API_URL + "customer/booking/",
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status === "OK") {
        $(".myBookingDetails").empty();
        var myBookingData = "";
        var pbtn = "";
        var pbtns = "";
        var pbtnCANCEL = "";
        for (var i = 0; i < jsonData.booking.length; i++) {
          var status = jsonData.booking[i].status;
          if (status == 0) {
            status =
              "<label style='color:red;font-size:12px;line-height:0;'>Pending Aprroval</label>";
            pbtn = "style=display:none;";
          } else if (status == 1) {
            status =
              "<label style='color:red;font-size:12px;line-height:0;'>Payment Pending</label>";
            pbtns = "style=display:none;";
          } else if (status == 2) {
            status =
              "<label style='color:Green;font-size:12px;line-height:0;'>Success</label>";
            pbtn = "style=display:none;";
            pbtns = "style=display:none;";
            pbtnCANCEL = "style=display:none;";
          } else if (status == 3) {
            status =
              "<label style='color:red;font-size:12px;line-height:0;'>Cancelled</label>";
            pbtn = "style=display:none;";
            pbtns = "style=display:none;";
            pbtnCANCEL = "style=display:none;";
          }
          var timeslot = jsonData.booking[i].timeslot;
          if (timeslot === "1") {
            timeslot = "9:00 AM - 2:30 PM";
          } else if (timeslot === "2") {
            timeslot = "3:00 PM - 9:00 PM";
          }
          var eventtype = jsonData.booking[i].eventtype;
          if (eventtype === "1") {
            eventtype = "Type 1";
          } else if (eventtype === "2") {
            eventtype = "Type 2";
          } else if (eventtype === "3") {
            eventtype = "Type 3";
          } else if (eventtype === "3") {
            eventtype = "Type 4";
          }
          var arrival = moment(jsonData.booking[i].arrival).format("MMM Do YY");
          var date = jsonData.booking[i].created;
          date = date.substring(0, date.length - 2);
          const timestamp = moment(date).fromNow();
          myBookingData +=
            '<div class="row inn-services in-blog" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;padding:20px;"><div class="col-md-4"  onclick="indiservice(' +
            jsonData.booking[i].sid +
            ');"> <img src="uploads/' +
            jsonData.booking[i].img +
            '" alt="" /> </div><div class="col-md-8"><h3 onclick="indiservice(' +
            jsonData.booking[i].sid +
            ');">' +
            jsonData.booking[i].name +
            '</h3> <span class="blog-date"><i class="fa fa-clock-o"></i> ' +
            timestamp +
            '</span><span class="blog-author"><i class="fa fa-building"></i> ' +
            jsonData.booking[i].org +
            "</span><p>" +
            jsonData.booking[i].sdesc +
            "</p><p>Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: " +
            status +
            "<br>Arrival  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: " +
            arrival +
            ".<br>Time Slot &nbsp;&nbsp;&nbsp;&nbsp;: " +
            timeslot +
            ".<br>Event Type &nbsp;: " +
            eventtype +
            '.</p> <a data-val="' +
            jsonData.booking[i].name +
            '"; onclick="payMyAmount(' +
            jsonData.booking[i].price +
            "," +
            jsonData.booking[i].sid +
            "," +
            jsonData.booking[i].usid +
            ',this); return false;" class="waves-effect waves-light inn-re-mo-btn" ' +
            pbtn +
            '>Pay ₹' +
            jsonData.booking[i].price +
            ' </a> <a class="waves-effect waves-light inn-re-mo-btn" ' +
            pbtns +
            ' onclick="indieditservice(' +
            jsonData.booking[i].sid +
            "," +
            jsonData.booking[i].usid +
            "," +
            jsonData.booking[i].uid +
            ')"><i class="fa fa-edit"></i> Edit</a> <a class="waves-effect waves-light inn-re-mo-btn" onclick="cancelBooking(' +
            jsonData.booking[i].sid +
            "," +
            jsonData.booking[i].usid +
            "," +
            jsonData.booking[i].uid +
            ')" ' +
            pbtnCANCEL +
            '><i class="fa fa-times"></i> Cancel</a></div></div>';
        }
        $(".myBookingDetails").html(myBookingData);
      } else {
      }
    },
  });
}

function cancelBooking(i, usid, uid) {
  if (getSessionKey()) {
    $.ajax({
      type: "POST",
      url: API_URL + "customer/edit-booking/",
      data: {
        usid: usid,
        cancel: 1,
      },
      success: function (response) {
        var jsonData = JSON.parse(response);
        if (jsonData.status === "OK") {
          $.ajax({
            type: "POST",
            url: API_URL + "customer/service-session/",
            data: {
              sid: i,
            },
            success: function (response) {
              var jsonData = JSON.parse(response);
              if (jsonData.status === "OK") {
                loadBooking();
              } else {
              }
            },
          });
        } else {
        }
      },
    });
  } else {
    $("#loginModal").click();
  }
}

function indieditservice(i, usid, uid) {
  if (getSessionKey()) {
    $.ajax({
      type: "POST",
      url: API_URL + "customer/edit-booking/",
      data: {
        usid: usid,
        cancel: 0,
      },
      success: function (response) {
        var jsonData = JSON.parse(response);
        if (jsonData.status === "OK") {
          $.ajax({
            type: "POST",
            url: API_URL + "customer/service-session/",
            data: {
              sid: i,
            },
            success: function (response) {
              var jsonData = JSON.parse(response);
              if (jsonData.status === "OK") {
                window.location.href =
                  "booking.php?forsessionuserservice=" +
                  usid +
                  "uidtrackSessionedit=true&uidsessiondata=" +
                  uid +
                  "dataedit=" +
                  i;
              } else {
              }
            },
          });
        } else {
        }
      },
    });
  } else {
    $("#loginModal").click();
  }
}

function indiservice(e) {
  if (getSessionKey()) {
    var sid = e;
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
        }
      },
    });
  } else {
    $("#loginModal").click();
  }
}

function payMyAmount(price, sid, user_service_id, e) {
  var totalAmount = price;
  var audit = $(e).attr("data-val");
  var service_id = sid;
  var user_service_id = user_service_id;
  var options = {
    key: "rzp_live_8ckloI2TLnpVvt",
    amount: totalAmount * 100,
    name: "Yuvakasanga",
    description: "Payment Details of " + audit,
    image: "img/siteimages/logo.png",
    handler: function (response) {
      successPayment(
        response.razorpay_payment_id,
        service_id,
        totalAmount,
        user_service_id
      );
    },
    theme: {
      color: "#528FF0",
    },
  };
  var rzp1 = new Razorpay(options);
  rzp1.open();
}

function successPayment(
  razorpay_payment_id,
  service_id,
  totalAmount,
  user_service_id
) {
  var razorpay_payment_id = razorpay_payment_id;
  var totalAmount = totalAmount;
  var service_id = service_id;
  var user_service_id = user_service_id;
  $.ajax({
    url: API_URL + "customer/payment-process/",
    type: "POST",
    data: {
      razorpay_payment_id: razorpay_payment_id,
      totalAmount: totalAmount,
      service_id: service_id,
      user_service_id: user_service_id,
    },
    success: function (res) {
      var jsonData = JSON.parse(res);
      if (jsonData.status === "OK") {
        loadBooking();
      } else {
        alert(jsonData.msg);
      }
    },
  });
}
