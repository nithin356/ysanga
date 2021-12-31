var edit = 0;
$(document).ready(function () {
    $('.verifyOtpshow').hide();
    $(".noOtp").hide();
    $(".otupdateScreen").hide();
    $(".otpUpdate").show();
    if (getSessionKey()) {
        loadProfile();
    } else {
        $("#loginModal").click();
    }
    $(".updateOtp").click(function () {
        edit = 1;
        update();
    });
    $(".updateNootp").click(function () {
        edit = 2;
        update();
    });
    $(".verifyOtp").click(function () {
        edit = 3;
        verifyOtp();
    });
});
//load user profile details
function loadProfile() {
    $('.verifyOtpshow').hide();
    $(".noOtp").hide();
    $(".otupdateScreen").hide();
    $(".otpUpdate").show();
    $.ajax({
        type: "POST",
        url: API_URL + "customer/edit-profile/",
        data: {
            edit: edit,
        },
        success: function (response) {
            var jsonData = JSON.parse(response);
            if (jsonData.status === "OK") {
                $("#UserName").val(jsonData.name);
                $("#OldNumber").val(jsonData.phone);
                $("#PhNumber").val(jsonData.phone);
                $("#Eml").val(jsonData.email);
            } else {
                alert("Error!!!");
            }
        },
    });
}

//Update user profile details
function update() {
    var usname = $("#UserName").val();
    var newNum = $("#PhNumber").val();
    var oldNum = $("#OldNumber").val();
    var Emil = $("#Eml").val();
    if (usname == "" || newNum == "" || oldNum == "" || Emil == "") {
        alert("Please fill the details!!!")
    } else if (oldNum != newNum) {
        $.ajax({
            type: "POST",
            url: API_URL + "customer/edit-profile/",
            data: {
                edit: edit,
                newNum: newNum,
            },
            success: function (response) {
                var jsonData = JSON.parse(response);
                if (jsonData.status === "OK") {
                    $(".noOtp").hide();
                    $(".otupdateScreen").show();
                    $('.verifyOtpshow').show();
                } else {
                    alert(jsonData.message);
                }
            },
        });

    } else {
        $.ajax({
            type: "POST",
            url: API_URL + "customer/edit-profile/",
            data: {
                edit: edit,
                usname: usname,
                num: newNum,
                email: Emil,
            },
            success: function (response) {
                var jsonData = JSON.parse(response);
                if (jsonData.status === "OK") {
                    edit = 0;
                    loadProfile();
                } else {
                    alert("Error!!!");
                }
            },
        });
    }

}

function verifyOTP() {
    var newNum = $("#PhNumber").val();
    var oldNum = $("#OldNumber").val();
    if (newNum != oldNum) {
        $(".noOtp").show();
        $(".otpUpdate").hide();
    } else {
        $(".noOtp").hide();
        $(".otpUpdate").show();
    }
}

function verifyOtp() {
    var newNum = $("#PhNumber").val();
    var otp = $(".otps")
        .map((_, el) => el.value)
        .get()
        .toString();
    otp = otp.replaceAll(",", "");
    $.ajax({
        type: "POST",
        url: API_URL + "customer/edit-profile/",
        data: {
            edit: edit,
            getPhone: newNum,
            otp: otp,
        },
        success: function (response) {
            var jsonData = JSON.parse(response);
            if (jsonData.status === "OK") {
                afterPhoneVerify();
            } else {
                alert("Error!!!");
            }
        },
    });
}

function afterPhoneVerify() {
    var usname = $("#UserName").val();
    var newNum = $("#PhNumber").val();
    var oldNum = $("#OldNumber").val();
    var Emil = $("#Eml").val();
    $.ajax({
        type: "POST",
        url: API_URL + "customer/edit-profile/",
        data: {
            edit: 2,
            usname: usname,
            num: newNum,
            email: Emil,
        },
        success: function (response) {
            var jsonData = JSON.parse(response);
            if (jsonData.status === "OK") {
                edit = 0;
                loadProfile();
            } else {
                alert("Error!!!");
            }
        },
    });
}