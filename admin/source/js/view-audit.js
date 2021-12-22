var pid = 0;
var img = "";
var wi = 0;
var wi = 0;
var p = 0;
var h = [];
$(document).ready(function () {
  loadProduct();
  $("#Search-product").keyup(function () {
    searchProduct();
  });
});

function getvalid(e) {
  var val_id = $(e).attr("data-value");
  $(".get-product-data").append(
    "<div style='padding-top:200px;' class='modal fade' id='exampleModalCenter' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'><div class='modal-dialog modal-dialog-centered' role='document'><div class='modal-content'><div class='modal-header'><h5 class='modal-title' id='exampleModalLongTitle'><b>Are you sure ?</b></h5><button type='button' class='close' style='margin-top:-20px;' data-dismiss='modal' aria-label='Close' onclick='window.location.reload();'><span aria-hidden='true'>&times;</span></button></div><div class='modal-body' style='color:black;'>You are going to delete the auditorium ,you wont be able to recover..</div><div class='modal-footer'><button type='button' class='btn btn-secondary' data-dismiss='modal' onclick='window.location.reload();'>Cancel</button><button type='button' class='delete-Product btn btn-danger' onclick='deleteProduct(this);' data-value='" +
      val_id +
      "' >Delete</button></div></div></div></div>"
  );
}

function loadProduct() {
  $.ajax({
    type: "POST",
    url: "source/get-services.php",
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status === "KO") {
        swal({
          text: jsonData.message,
          type: "warning",
        }).then(function () {
          window.location = "add-auditorium.php";
        });
      } else {
        $(".bread-crumbs").html("View Auditorium");
        for ($i = 0; $i < jsonData.service.length; $i++) {
          h.push(
            "uploads/" +
              jsonData.service[$i].img
          );
          get_product_name = jsonData.service[$i].sname;
          get_pr_desc = jsonData.service[$i].sdesc;
          if (get_product_name.length > 20) {
            product = get_product_name.slice(0, 20) + "...";
          } else {
            product = get_product_name;
          }
          if (get_pr_desc.length > 20) {
            product_desc = get_pr_desc.slice(0, 20) + "...";
          } else {
            product_desc = get_pr_desc;
          }
          $("#loading-bar-spinner").hide();
          $(".get-product-data").append(
            "<div class='isotope-item document col-sm-6 col-md-4 col-lg-3 target'><div class='thumbnail'><div class='thumb-preview'><a class='thumb-image' href='../uploads/" +
              jsonData.service[$i].img +
              "'><img style='height:230px;width:230px;' src='../uploads/" +
              jsonData.service[$i].img +
              "' class='img-responsive' alt='Project'></a><div class='mg-thumb-options'><div class='mg-toolbar'><label class='update-Product' onclick='updateProduct(this);' id='product' data-value='" +
              jsonData.service[$i].sid +
              "'>EDIT</label><div class='mg-group pull-right'><label class='delete-Product' data-toggle='modal' onclick='getvalid(this);' data-target='#exampleModalCenter' data-value='" +
              jsonData.service[$i].sid +
              "'>DELETE</label></div></div></div></div><h5 class='mg-title  text-semibold'>" +
              product +
              "<br></h5><div class='mg-description'><small class='pull-left text-muted'>" +
              product_desc +
              "</small><small class='pull-right text-muted'>" +
              jsonData.service[$i].price +
              "</small></div></div></div>"
          );
        }
      }
    },
  });
}

function searchProduct() {
  input = document.getElementById("Search-product");
  filter = input.value.toUpperCase();
  var length = document.getElementsByClassName("target").length;
  for (i = 0; i < length; i++) {
    if (
      document
        .getElementsByClassName("target")
        [i].innerHTML.toUpperCase()
        .indexOf(filter) > -1
    ) {
      document.getElementsByClassName("target")[i].style.display = "block";
    } else {
      document.getElementsByClassName("target")[i].style.display = "none";
    }
  }
}

function deleteProduct(e) {
  var pid = $(e).attr("data-value");
  $.ajax({
    type: "POST",
    url: "source/delete-audit.php",
    data: {
      pid: pid,
    },
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status === "KO") {
        alert(jsonData.message);
      } else if (jsonData.status === "OK") {
        location.reload();
      }
    },
  });
}

function updateProduct(e) {
  var pid = $(e).attr("data-value");
  $.ajax({
    type: "POST",
    url: "source/update-audit.php",
    data: {
      pid: pid,
    },
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status === "KO") {
        alert(jsonData.message);
      } else if (jsonData.status === "OK") {
        window.location = "update-auditorium.php";
      }
    },
  });
}
