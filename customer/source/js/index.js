var featured = 0;
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
          classdata = "col-md-4";
        } else if (len == 2) {
          $(".hom1").show();
          classdata = "col-md-4";
        } else if (len == 0) {
          $(".hom1").hide();
        } else {
          $(".hom1").show();
          classdata = "col-md-4";
        }
        for (var i = 0; i < jsonData.service.length; i++) {
          var mydataReview = "";
          if (jsonData.service[i].fullRation == 1) {
            mydataReview =
              'Rating: <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>';
          } else if (jsonData.service[i].fullRation == 2) {
            mydataReview =
              'Rating: <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>';
          } else if (jsonData.service[i].fullRation == 3) {
            mydataReview =
              'Rating: <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>';
          } else if (jsonData.service[i].fullRation == 4) {
            mydataReview =
              'Rating: <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>';
          } else if (jsonData.service[i].fullRation == 5) {
            mydataReview =
              'Rating: <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>';
          } else if (jsonData.service[i].fullRation == 0) {
            mydataReview = "";
          }
          $(".getService").append(
            '<div style="cursor:pointer;" onclick="indiservice(this)" data-service="' +
              jsonData.service[i].sid +
              '" class="' +
              classdata +
              '"><div class="to-ho-hotel-con"><div class="to-ho-hotel-con-1"><div class="hom-hot-av-tic">View <i class="fa fa-eye" ></i></div><img src="uploads/' +
              jsonData.service[i].img +
              '" alt=""></div><div class="to-ho-hotel-con-23"><div class="to-ho-hotel-con-2"><a class="services" data-service="' +
              jsonData.service[i].sid +
              '"><h4>' +
              jsonData.service[i].sname +
              '</h4></a> </div><div class="to-ho-hotel-con-3"><ul><li>' +
              jsonData.service[i].sdesc +
              '<div class="dir-rat-star ho-hot-rat-star"> ' +
              mydataReview +
              ' </div></li><li><span class="ho-hot-pri-dis">₹ ' +
              jsonData.service[i].oprice +
              '</span><span class="ho-hot-pri">₹ ' +
              jsonData.service[i].price +
              "</span></li></ul></div></div></div></div>"
          );
          var f = "";
          if (featured != 0) {
            f =
              '<div class="ribbon ribbon-top-left"><span>Featured</span></div>';
          }
          $(".ourService").empty();
          var array = jsonData.service[i].specs;
          var str_array = array.split(",");
          var specs = "";
          for (var w = 0; w < str_array.length; w++) {
            specs += "<li>" + str_array[w] + "</li>";
          }
          var add = "";
          if ($(window).width() < 960) {
            add = "";
          } else {
            add = 'height="120px"';
          }
          $(".ourService").html(
            '<div class="room">' +
              f +
              '<div class="r1 r-com"><img ' +
              add +
              ' src="uploads/' +
              jsonData.service[i].img +
              '" alt="" /></div><div class="r2 r-com"><h4>' +
              jsonData.service[i].sname +
              '</h4><div class="r2-ratt"> '+mydataReview+' <span> '+jsonData.service[i].fullRation+' / 5</span> </div><ul><li>Capacity: <i class="fa fa-couch"></i>   ' +
              jsonData.service[i].capacity +
              '</li><li></li><li></li></ul></div><div class="r3 r-com"><ul>' +
              specs +
              '</ul></div><div class="r4 r-com"><p>Price</p><p><span class="room-price-1">₹ ' +
              jsonData.service[i].price +
              '</span> <span class="room-price">₹: ' +
              jsonData.service[i].oprice +
              '</span></p><p>Non Refundable</p></div><div class="r5 r-com"><div class="r2-available" style="display:none;">Available</div><center><br><a onclick="indiservice(this)" data-service="' +
              jsonData.service[i].sid +
              '" class="inn-room-book" style="cursor: pointer;">Book</a></center></div></div>'
          );
        }
      } else {
        $(".hom1").hide();
      }
    },
  });
}

function indiservice(e) {
  // if (getSessionKey()) {
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
  // } else {
  //   $("#loginModal").click();
  // }
}
