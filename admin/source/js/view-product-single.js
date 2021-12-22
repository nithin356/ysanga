$(".bread-crumbs").html("Update Auditorium");
var firstUploads = new FileUploadWithPreview("myFirstImages");
var secondUploads = new FileUploadWithPreview("mySecondImages");

$(document).ready(function () {
  $(".add-cover").hide();
  $(".add-other-images").hide();
  $("#cover").click(function () {
    $(".add-cover").show();
    $(".cover").hide();
  });

  $("#add-image").click(function () {
    $(".add-other-images").show();
    $(".other-images").hide();
  });

  $("#update-cover-image").submit(function (e) {
    e.preventDefault();
    // AJAX call
    $.ajax({
      type: "POST",
      url: "./source/audit-image-update.php",
      cache: false,
      contentType: false,
      processData: false,
      data: new FormData(this),
      success: function (response) {
        var jsonData = JSON.parse(response);
        if (jsonData.status === "success") {
          swal("Success!", "" + jsonData.message, "success");
          load_product();
        }else{
          alert(jsonData.message);
        }
      },
    });
  });

  // multi image
  $("#update-multi-image").submit(function (e) {
    e.preventDefault();
    // AJAX call
    $.ajax({
      type: "POST",
      url: "./source/audit-image-update.php",
      cache: false,
      contentType: false,
      processData: false,
      data: new FormData(this),
      success: function (response) {
        var jsonData = JSON.parse(response);
        if (jsonData.status === "success") {
          swal("Success!", "" + jsonData.message, "success");
          load_product();
        }
      },
    });
  });
  // delete image
  $(".delete-image").click(function () {
    var img_id = $(this).attr("data-id");
    var type = "remove";
    // AJAX call
    $.ajax({
      type: "POST",
      url: "./source/audit-image-update.php",
      data: {
        type: type,
        imgid: img_id,
      },
      success: function (response) {
        var jsonData = JSON.parse(response);
        if (jsonData.status === "success") {
          swal("Success!", "" + jsonData.message, "success");
          load_product();
        }
      },
    });
  });
});
