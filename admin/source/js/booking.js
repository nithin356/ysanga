var get =
  '<center>  <div class="loadingio-spinner-eclipse-buzqzyg4ugr">    <div class="ldio-h7cmfxhg4bf">      <div></div>    </div>  </div></center>';
$(document).ready(function () {
  $(".bread-crumbs").html("Your Bookings");
  $(".sidebar-toggle").click();
  $(".sidebar-toggle").attr("style", "pointer-events:none;");
  getBookings();
});

function getBookings() {
  $(".newBookings").empty();
  $(".proccessedBooking").empty();
  $(".completedBooking").empty();
  $(".newBookings").html(get);
  $(".proccessedBooking").html(get);
  $(".completedBooking").html(get);
  $.ajax({
    type: "POST",
    url: "source/get-bookings.php",
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status === "OK") {
        for ($i = 0; $i < jsonData.booking.length; $i++) {
          var newBookings = "";
          var proccessed = "";
          var completed = "";
          var date = jsonData.booking[$i].created;
          date = date.substring(0, date.length - 2);
          const timestamp = moment(date).fromNow();
          if (jsonData.booking[$i].statusno == 0) {
            newBookings +=
              '<div class="col-md-4 mb-4"><div class="card shadow" style="border-radius:10px;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;padding:20px;"><center><img src="../uploads/' +
              jsonData.booking[$i].img +
              '" class="card-img-top img-responsive" style="height:150px;width:150px;" alt="' +
              jsonData.booking[$i].name +
              '"></center><hr><div class="card-body"><h5 class="card-title">' +
              jsonData.booking[$i].name +
              '</h5><p class="card-text">User : ' +
              jsonData.booking[$i].username +
              '</p><p class="card-text">Phone : ' +
              jsonData.booking[$i].phone +
              '</p><p class="card-text">Email : ' +
              jsonData.booking[$i].email +
              '</p><p class="card-text">Arrival : ' +
              moment(jsonData.booking[$i].arrival).format("MMM Do YY") +
              '</p><p class="card-text">Time Slot : ' +
              jsonData.booking[$i].timeslot +
              '</p><p class="card-text">Event Type : ' +
              jsonData.booking[$i].eventtype +
              '</p><p class="card-text">Organisation : ' +
              jsonData.booking[$i].org +
              '</p><p class="card-text">Other Info : ' +
              jsonData.booking[$i].other +
              '</p><p class="card-text">Payment Status : Not Proccessed</p><a class="btn btn-primary" onclick="changeStatus(1,'+jsonData.booking[$i].sid+');">CHANGE STATUS TO APPROVED</a></div><hr><div class="card-footer  text-right">' +
              timestamp +
              "</div></div></div>";
          }
          if (jsonData.booking[$i].statusno == 1) {
            proccessed +=
              '<div class="col-md-4 mb-4"><div class="card shadow" style="border-radius:10px;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;padding:20px;"><center><img src="../uploads/' +
              jsonData.booking[$i].img +
              '" class="card-img-top img-responsive" style="height:150px;width:150px;" alt="' +
              jsonData.booking[$i].name +
              '"></center><hr><div class="card-body"><h5 class="card-title">' +
              jsonData.booking[$i].name +
              '</h5><p class="card-text">User : ' +
              jsonData.booking[$i].username +
              '</p><p class="card-text">Phone : ' +
              jsonData.booking[$i].phone +
              '</p><p class="card-text">Email : ' +
              jsonData.booking[$i].email +
              '</p><p class="card-text">Arrival : ' +
              moment(jsonData.booking[$i].arrival).format("MMM Do YY") +
              '</p><p class="card-text">Time Slot : ' +
              jsonData.booking[$i].timeslot +
              '</p><p class="card-text">Event Type : ' +
              jsonData.booking[$i].eventtype +
              '</p><p class="card-text">Organisation : ' +
              jsonData.booking[$i].org +
              '</p><p class="card-text">Other Info : ' +
              jsonData.booking[$i].other +
              '</p><p class="card-text">Payment Status : Not Proccessed</p><a class="btn btn-primary" onclick="changeStatus(2,'+jsonData.booking[$i].sid+');">CHANGE STATUS TO COMPLETED</a></div><hr><div class="card-footer  text-right">' +
              timestamp +
              "</div></div></div><br>";
          }
          if (jsonData.booking[$i].statusno == 2) {
            completed +=
              '<div class="col-md-4 mb-4"><div class="card shadow" style="border-radius:10px;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;padding:20px;"><center><img src="../uploads/' +
              jsonData.booking[$i].img +
              '" class="card-img-top img-responsive" style="height:150px;width:150px;" alt="' +
              jsonData.booking[$i].name +
              '"></center><hr><div class="card-body"><h5 class="card-title">' +
              jsonData.booking[$i].name +
              '</h5><p class="card-text">User : ' +
              jsonData.booking[$i].username +
              '</p><p class="card-text">Phone : ' +
              jsonData.booking[$i].phone +
              '</p><p class="card-text">Email : ' +
              jsonData.booking[$i].email +
              '</p><p class="card-text">Arrival : ' +
              moment(jsonData.booking[$i].arrival).format("MMM Do YY") +
              '</p><p class="card-text">Time Slot : ' +
              jsonData.booking[$i].timeslot +
              '</p><p class="card-text">Event Type : ' +
              jsonData.booking[$i].eventtype +
              '</p><p class="card-text">Organisation : ' +
              jsonData.booking[$i].org +
              '</p><p class="card-text">Other Info : ' +
              jsonData.booking[$i].other +
              '</p><p class="card-text">Payment Status : Not Proccessed</p><a class="btn btn-primary">COMPLETED</a></div><hr><div class="card-footer text-right">' +
              timestamp +
              "</div></div></div><br>";
          }
          $(".newBookings").html(newBookings);
          $(".proccessedBooking").html(proccessed);
          $(".completedBooking").html(completed);
          if (newBookings == "") {
            $(".newBookings").html(
              '<center><div style="border-radius:10px;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;height:60px;"><br><i class="fa fa-exclamation-circle" aria-hidden="true"></i> No Data Found</div></center>'
            );
          }
          if (proccessed == "") {
            $(".proccessedBooking").html(
              '<center><div style="border-radius:10px;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;height:60px;"><br><i class="fa fa-exclamation-circle" aria-hidden="true"></i> No Data Found</div></center>'
            );
          }
          if (completed == "") {
            $(".completedBooking").html(
              '<center><div style="border-radius:10px;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;height:60px;"><br><i class="fa fa-exclamation-circle" aria-hidden="true"></i> No Data Found</div></center>'
            );
          }
        }
      } else {
      }
    },
  });
}

function changeStatus(i,sid) {
  $.ajax({
    type: "POST",
    url: "source/update-bookingStatus.php",
    data: {
      pid: i,
      sid: sid,
    },
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status === "KO") {
          alert(jsonData.message);
      } else if (jsonData.status === "OK") {
        getBookings();
      }
    },
  });
}
