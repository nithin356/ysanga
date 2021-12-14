<?php
include "../../access/connect.php";
if (isset($_POST['resetemail'])) {
    $remail = $_POST['resetemail'];
    $query = "SELECT * FROM `ec_adminsignup` WHERE ec_ad_email='$remail'";
    $result = mysqli_query($connection, $query);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $str = random_int(256321, 986523);
        $mdstr = md5($str);
        $query2 = "INSERT INTO `reset_password` (email,tempstr) VALUES ('$remail','$mdstr') ";
        $result2 = mysqli_query($connection, $query2);
        $link = "https://qavenue.in/admin/recover-password.php?id=$mdstr";

        $to_Email       = $remail; // Replace with recipient email address
        $subject        = 'Password Reset Request'; //Subject line for emails
        $host           = "ssl://qavenue.in"; // Your SMTP server. For example, smtp.mail.yahoo.com
        $user           = "noreply@qavenue.in"; //For example, your.email@yahoo.com
        $password       = "M3Nj;UHdNZ&!"; // Your password
        $SMTPSecure     = "tls"; // For example, ssl
        $port           = 465; // For example, 465

        //proceed with PHP email.
        include("../../mailer/PHPMailerAutoload.php"); //you have to upload class files "class.phpmailer.php" and "class.smtp.php"
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug  = 0;
        $mail->SMTPAuth = true;
        $mail->Host = $host;
        $mail->Username = $user;
        $mail->Password = $password;
        $mail->SMTPSecure = $SMTPSecure;
        $mail->Port = $port;
        $mail->setFrom($user);
        $mail->addReplyTo($remail);
        $mail->AddAddress($to_Email);
        $mail->Subject = $subject;
        $mail->Body = '<div width="100%" style="background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">
  <div style="max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px">
    <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 20px">
      <tbody>
        <tr>
          <td style="vertical-align: top; padding-bottom:30px;" align="center">
		  <a href="https://www.qavenue.in"><img src="http://i.imgur.com/uvwFQf3.png" style="border:none alt="Logo" title="Logo" style="display:block" width="200" height="50""/></a>
        </td>
        </tr>
      </tbody>
    </table>
    <div style="padding: 40px; background: #fff;">
      <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
        <tbody><tr><td style="border-bottom:1px solid #f6f6f6;"><h1 style="font-size:14px; font-family:arial; margin:0px; font-weight:bold;">Dear Sir/Madam,</h1><p style="margin-top:0px; color:#bbbbbb;">Here are your password reset instructions.</p></td></tr><tr><td style="padding:10px 0 30px 0;"><p>A request to reset your Account password has been made. If you did not make this request, simply ignore this email. If you did make this request, please reset your password:</p><center><a href="' . $link . '" style="display: inline-block; padding: 11px 30px; margin: 20px 0px 30px; font-size: 15px; color: #000; background: #8a2be2; border-radius: 60px; text-decoration:none;">Reset Password</a></center><b>- Thanks (CodersDek team)</b> </td></tr>
        </tbody>
      </table>
    </div>
    <div style="text-align: center; font-size: 12px; color: #b2b2b5; margin-top: 20px">
    <p>CodersDek © 2020 <br></p></div></div></div>';
        $mail->WordWrap = 200;
        $mail->IsHTML(true);
        if (!$mail->send()) {
            $data = array('status' => 'error', 'message' => 'E-mail not sent');
        } else {
            $data = array('status' => 'success', 'message' => 'E-mail sent successfully');
        }
    } else {
        $data = array('status' => 'error', 'message' => 'E-mail address is not registered, Please Sign up');
    }
}
if (isset($_POST['password']) && isset($_POST['cpassword'])) {
    $id = $_POST['id'];
    $query = "SELECT email FROM reset_password WHERE tempstr='$id'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $check = mysqli_num_rows($result);
    if ($check != 1) {
        $data = array('status' => 'error', 'message' =>  'EXPIRED LINK!');
    } else {
        $email = $row["email"];
        $password = md5($_POST['password']);
        $repassword = md5($_POST['cpassword']);
        if ($password == $repassword) {
            $query = "SELECT * FROM ec_adminsignup WHERE ec_ad_email='$email'";
            $result = mysqli_query($connection, $query);
            $count = mysqli_num_rows($result);
            if ($count == 1) {
                $query1 = "UPDATE ec_adminsignup SET ec_ad_password='$password' WHERE ec_ad_email='$email' ";
                $result = mysqli_query($connection, $query1);
                if ($result) {
                    $data = array('status' => 'success', 'message' => 'Password has been reset successfully, Please Login');
                    $query5 = "DELETE FROM reset_password WHERE tempstr='$id'";
                    $result9 = mysqli_query($connection, $query5);
                }
            }
        } else {
            $data = array('status' => 'error', 'message' => 'Password does not match!');
        }
    }
}
echo json_encode($data);
