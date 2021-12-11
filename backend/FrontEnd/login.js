$(document).ready(function () {
    $("#Ulogin").on("click", function () {
        login();
    });
    $("#Rgstr").on("click", function () {
        register();
    });
    $("#Ulogin").on("click", function () {
        login();
        $($("#Otp").data("target")).show();
    });
});
//login
function login(){
var Phnumber = $("#Phno").val();
if(Phnumber==""){
    swal("Warning!", "Please fill all the fields!", "warning");
}else{
    // $.ajax({
    //     type: "POST",
    //     url: "",
    //     data: {
    //         Phnumber : Phnumber,
    //     },
    //     success: function (response) {
    //         var jsonData = JSON.parse(response);
    //         if (jsonData.status === "passwordError") {
    //             swal("Warning", "Password Error", "warning");
    //             $(".passwordError").html(jsonData.message);
    //         } else if (jsonData.status === "emailError") {
    //             swal("Warning!", "Username is Incorrect", "warning");
    //             $(".emailError").html(jsonData.message);
    //         } else if (jsonData.status === "success") {
    //             swal("Success", "Added Successfully", "Success");
    //             window.location = "";
    //         }
    //     },
    // });
}
}

//Register
function register(){
    var Rusername = $("#Rusername").val();
    var Remail = $("#Remail").val();
    var Rpassword = $("#Rpswd").val();
    var RCpassword = $("#Rcpswd").val();

}