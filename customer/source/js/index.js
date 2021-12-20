$(document).ready(function () {
  //Load Events
  loadService();
  //Sidebar
  $(".side-bar-close").click(function () {
    $(".hide-menu").click();
  });
});

//Load Service
function loadService() {
  $(".hom1").hide();
  $.ajax({
    type: "POST",
    url: API_URL + "customer/services/",
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status === "OK") {
        var len = jsonData.service.length;
        var classdata = "";
        if (len == 1) {
          $(".hom1").show();
          classdata = "col-md-12";
        } else if (len == 2) {
          $(".hom1").show();
          classdata = "col-md-6";
        } else if (len == 0) {
          $(".hom1").hide();
        } else {
          $(".hom1").show();
          classdata = "col-md-4";
        }
        for (var i = 0; i < jsonData.service.length; i++) {
          $(".getService").append(
            '<div class="' +
              classdata +
              '"><div class="to-ho-hotel-con"><div class="to-ho-hotel-con-1"><div class="hom-hot-av-tic"> Seating Capacity: ' +
              jsonData.service[i].capacity +
              ' </div> <img src="uploads/' +
              jsonData.service[i].img +
              '" alt=""></div><div class="to-ho-hotel-con-23"><div class="to-ho-hotel-con-2"> <a onclick="indiservice(this)" class="services" data-service="' +
              jsonData.service[i].sid +
              '"><h4>' +
              jsonData.service[i].sname +
              '</h4></a> </div><div class="to-ho-hotel-con-3"><ul><li>' +
              jsonData.service[i].sdesc +
              '<div class="dir-rat-star ho-hot-rat-star"> Rating: <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i></div></li><li><span class="ho-hot-pri-dis">₹ ' +
              jsonData.service[i].price +
              '</span><span class="ho-hot-pri">₹ ' +
              jsonData.service[i].price +
              "</span></li></ul></div></div></div></div>"
          );
        }
      } else {
        $(".hom1").hide();
      }
    },
  });
}

function indiservice(e) {
  if (getSessionKey()) {
    var sid = $(e).attr("data-service");
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
    $('#loginModal').click();
  }
}
