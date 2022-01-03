$(document).ready(function () {
  $(".bread-crumbs").html("View Payments");
  loadPaymentInfo();
});

function loadPaymentInfo() {
  $.ajax({
    type: "POST",
    url: "source/loadPayment.php",
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status === "KO") {
        swal({
          text: jsonData.message,
          type: "warning",
        }).then(function () {
          window.location = "index.php";
        });
      } else {
        for ($i = 0; $i < jsonData.data.length; $i++) {
          $("tbody").append(
            "<tr><td>" +
              jsonData.data[$i].usname +
              "</td><td>" +
              jsonData.data[$i].rp_id +
              "</td><td>" +
              jsonData.data[$i].email +
              "</td><td>" +
              jsonData.data[$i].auditorium +
              "</td><td>" +
              jsonData.data[$i].amount/100 +
              " <i class='fa fa-inr'></i></td><td>" +
              moment.unix(jsonData.data[$i].created_at).format('MMM Do YYYY, h:mm:ss a') +
              "</td><td>" +
              jsonData.data[$i].status +
              "</td></tr>"
          );
        }
        $(".paymenttable").DataTable({ ordering: false });
      }
    },
  });
}
