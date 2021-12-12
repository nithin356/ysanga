$(document).ready(function () {
  loadService();
});
function loadService() {
  $.ajax({
    type: "POST",
    url: API_URL + "customer/service/",
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status === "OK") {
      } else {
      }
    },
  });
}
