<?php
session_write_close();
session_name("CONTACTSES");
session_start();
require 'PHPMailer/PHPMailerAutoload.php';
date_default_timezone_set("Asia/Jakarta");

// Recipients
$to = "recipient1@email.com, recipient2@email.com";

if(!isset($_SESSION['cont_cs_rf_token'])) {
	$token = bin2hex(openssl_random_pseudo_bytes(8));
	$_SESSION['cont_cs_rf_token'] = "ok_".$token;
} else {
	$token = explode("_", $_SESSION['cont_cs_rf_token']);
	$token = $token[1];
}

if($_POST) {
	if(!isset($_POST['n'])) {
		echo "Something went wrong";
		return;
	}
	if(!isset($_POST['name']) || trim($_POST['name']) == "") {
		echo "Name is required";
		return;
	}
	if(!isset($_POST['email'])) {
		echo "Email is required";
		return;
	}
	if(trim($_POST['email']) == "") {
		echo "Email is required";
		return;
	}
	if(!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
		echo "Invalid Email";
		return;
	}
	if(!isset($_POST['message']) || trim($_POST['message']) == "") {
		echo "Message is required";
		return;
	}
	if("ok_".$_POST['n'] != $_SESSION['cont_cs_rf_token']) {
		echo "Invalid submit";
		return;
	}
	$u_name = trim($_POST['name']);
	$u_email = trim($_POST['email']);
	$u_message = trim($_POST['message']);
	$html = '<!DOCTYPE html>
<html style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; margin: 0; padding: 0;">
<head>
<meta name="viewport" content="width=device-width">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Someone is contacting you</title>
</head>
<body bgcolor="#f6f6f6" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; -webkit-font-smoothing: antialiased; height: 100%; -webkit-text-size-adjust: none; width: 100% !important; margin: 0; padding: 0;">

<!-- body -->
<table class="body-wrap" bgcolor="#f6f6f6" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; width: 100%; margin: 0; padding: 20px;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; margin: 0; padding: 0;">
<td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; margin: 0; padding: 0;"></td>
    <td class="container" bgcolor="#FFFFFF" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; clear: both !important; display: block !important; max-width: 600px !important; Margin: 0 auto; padding: 20px; border: 1px solid #f0f0f0;">

      <!-- content -->
      <div class="content" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; display: block; max-width: 600px; margin: 0 auto; padding: 0;">
      <table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; width: 100%; margin: 0; padding: 0;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; margin: 0; padding: 0;">
<td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; margin: 0; padding: 0;">
			<h1 style="font-family: \'Helvetica Neue\', Helvetica, Arial, \'Lucida Grande\', sans-serif; font-size: 36px; line-height: 1.2em; color: #111111; font-weight: 200; margin: 0px 0 10px; padding: 0; text-align: center;">Nusantara Speedcubing Association</h1>
			<hr>
            <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6em; font-weight: normal; margin: 0 0 10px; padding: 0;">Hi there,</p>
            <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6em; font-weight: normal; margin: 0 0 10px; padding: 0;">Someone is contacting you.</p>
            <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6em; font-weight: normal; margin: 0 0 10px; padding: 0;">Name: '.$u_name.'<br>Email: <a href="mailto:'.$u_email.'">'.$u_email.'</a><br>Message: '.$u_message.'</p>
            <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6em; font-weight: normal; margin: 0 0 10px; padding: 0;">Happy cubing!</p>
            <br>
            <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6em; font-weight: normal; margin: 0 0 10px; padding: 0;"><a href="https://www.facebook.com/groups/72117584231/" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; color: #348eda; margin: 0; padding: 0;" target="_blank">Follow Nusantara Speedcubing Association on Facebook</a></p>
          </td>
        </tr></table>
</div>
      <!-- /content -->
      
    </td>
    <td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; margin: 0; padding: 0;"></td>
  </tr></table>
<!-- /body --><!-- footer --><table class="footer-wrap" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; clear: both !important; width: 100%; margin: 0; padding: 0;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; margin: 0; padding: 0;">
<td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; margin: 0; padding: 0;"></td>
    <td class="container" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; clear: both !important; display: block !important; max-width: 600px !important; margin: 0 auto; padding: 0;">
      
      <!-- content -->
      <div class="content" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; display: block; max-width: 600px; margin: 0 auto; padding: 0;">
        <table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; width: 100%; margin: 0; padding: 0;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; margin: 0; padding: 0;">
<td align="center" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; margin: 0; padding: 0;">
              <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 1.6em; color: #666666; font-weight: normal; margin: 0 0 10px; padding: 0;">This is an automatically generated email, please do not reply this email.<br>Email us at <a href="mailto:info@nsa.or.id">info@nsa.or.id</a>.
              </p>
              <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 1.6em; color: #666666; font-weight: normal; margin: 0 0 10px; padding: 0;">
              </p>
            </td>
          </tr></table>
</div>
      <!-- /content -->
      
    </td>
    <td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; margin: 0; padding: 0;"></td>
  </tr></table>
<!-- /footer -->
</body>
</html>';
	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->Host = 'mail.host.com';
	$mail->Port = 465;
	$mail->SMTPSecure = 'ssl';
	$mail->SMTPAuth = true;
	$mail->Username = "sender@email.com";
	$mail->Password = "password";
	$mail->setFrom('sender@email.com', 'Sender Name');
	$reci = explode(",", $to);
	foreach($reci as $rec) {
		$mail->addAddress(trim($rec), trim($rec));
	}
	$mail->Subject = 'Someone is contacting you';
	$mail->IsHTML(true);
	$mail->Body = $html;
	$mail->AltBody = 'Someone is contacting you';
	if(!$mail->send()) {
		echo "Something went wrong. Please contact us manually at ".$to.".";
		return;
	} else {
		echo 200;
		unset($_SESSION['cont_cs_rf_token']);
		return;
	}
}
session_write_close();

?>