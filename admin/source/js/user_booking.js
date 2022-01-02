$(document).ready(function () {
  $(".bread-crumbs").html("Book Auditorium");
  $("#booking-form").submit(function (e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "./source/book-auditorium.php",
      cache: false,
      contentType: false,
      processData: false,
      data: new FormData(this),
      success: function (response) {
        var jsonData = JSON.parse(response);
        if (jsonData.status === "KO") {
          swal("Error!", "" + jsonData.message, "error");
        } else if (jsonData.status === "OK") {
          location.reload();
        }
      },
    });
  });
});
