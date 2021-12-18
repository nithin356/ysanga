var firstUploads = new FileUploadWithPreview("myFirstImage");
var secondUploads = new FileUploadWithPreview("mySecondImage");
$(document).ready(function () {
  $("#product-form").submit(function (e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "./source/add-auditorium.php",
      cache: false,
      contentType: false,
      processData: false,
      data: new FormData(this),
      success: function (response) {
        var jsonData = JSON.parse(response);
        if (jsonData.status === "error") {
          alert("show error message");
        } else if (jsonData.status === "success") {
          location.reload();
        }
      },
    });
  });
});

function add_audit(e) {}
