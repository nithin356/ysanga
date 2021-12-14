$(document).ready(function () {
  $.ajax({
    type: "POST",
    url: "source/dashboard.php",
    success: function (response) {
      var jsonData = JSON.parse(response);
      if (jsonData.status === "success") {
          $('.tproducts').html(jsonData.pcount);
          $('.venamt').html(jsonData.vendor);
          $('.onholdac').html(jsonData.vendoroh);
          $('.renamt').html(jsonData.reseller);
          $('.onholdrac').html(jsonData.roh);
          $('.ordcount').html(jsonData.payment);
      }
    },
  });
});
