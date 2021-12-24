$(document).ready(function () {
  $(".submit_product").click(function (e) {
    e.preventDefault();
    // AJAX call
    var name = $(".vn_pname").val();
    var sdes = $(".vn_sdes").val();
    var bdes = $(".vn_bdes").val();
    var status = $(".vn_status").val();
    var price = $(".vn_price").val();
    var capacity = $(".vn_cap").val();
    var phone = $(".vn_phone").val();
    var specs = $(".vn_specs").val();
    var address = $(".vn_addrs").val();

    if (
      name === "" ||
      sdes === "" ||
      bdes === "" ||
      price === "" ||
      capacity === "" ||
      address === "" ||
      specs === "" ||
      phone === ""
    ) {
      swal("Warning!", "Please fill all the fields!", "warning");
    } else {
      $(".submit_product").attr("style", "  pointer-events: none;");
      $(".submit_product").html("Loading..!");
      $.ajax({
        type: "POST",
        url: "./source/update-single-data.php",
        data: {
          name: name,
          sdes: sdes,
          bdes: bdes,
          price: price,
          status: status,
          capacity: capacity,
          specifications: specs,
          address: address,
          phone: phone,
        },
        success: function (response) {
          var jsonData = JSON.parse(response);
          if (jsonData.status === "KO") {
            $(".submit_product").attr("style", "  pointer-events: cursor;");
            $(".submit_product").html("Update");
            swal("Error!", jsonData.message, "warning");
          } else if (jsonData.status === "OK") {
            $(".submit_product").attr("style", "  pointer-events: cursor;");
            $(".submit_product").html("Update");
            swal({
              title: "Success!",
              text: jsonData.message,
              type: "success",
            });
            load_product();
          }
        },
      });
    }
  });
});
