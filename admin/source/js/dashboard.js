$(document).ready(function () {
  $.ajax({
    type: "POST",
    url: "source/dashboard.php",
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status === "success") {
          $('.urbooking').html(jsonData.urbooking);
          $('.pendingbooking').html(jsonData.pendingbooking);
          $('.cancelled').html(jsonData.cancelled);
          $('.onbooking').html(jsonData.onbooking);
      }
    },
  });
});
