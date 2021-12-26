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
        var myBookingData = "";
        for (var i = 0; i < jsonData.booking.length; i++) {
          var status = jsonData.booking[i].status;
          var pbtn = "";
          if (status == 0) {
            status =
              "<label style='color:red;font-size:12px;line-height:0;'>Pending Aprroval</label>";
          } else if (status == 1) {
            status =
              "<label style='color:red;font-size:12px;line-height:0;'>Payment Pending</label>";
            // pbtn="style=display:none;"
          } else if (status == 2) {
            status =
              "<label style='color:Green;font-size:12px;line-height:0;'>Success</label>";
            // pbtn="style=display:none;"
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
            '.</p> <a class="waves-effect waves-light inn-re-mo-btn" ' +
            pbtn +
            '><i class="fa fa-lock"></i> Pay</a> <a class="waves-effect waves-light inn-re-mo-btn" ' +
            pbtn +
            ' onclick="indieditservice(' +
            jsonData.booking[i].sid +
            "," +
            jsonData.booking[i].usid +
            "," +
            jsonData.booking[i].uid +
            ')"><i class="fa fa-edit"></i> Edit</a></div></div>';
        }
        $(".myBookingDetails").html(myBookingData);
      } else {
      }
    },
  });
}

function indieditservice(i, usid, uid) {
  if (getSessionKey()) {
    $.ajax({
      type: "POST",
      url: API_URL + "customer/edit-booking/",
      data: {
        usid: usid,
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
