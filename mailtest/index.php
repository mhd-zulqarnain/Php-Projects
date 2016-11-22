<?php
require_once'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer(); // create a new object
//$mail->isSMTP(); // enable SMTP

/*if($mail->isSMTP()){
    echo('found');
};

exit;*/

$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = 'tls';
$mail->Port = 587; // or 587
$mail->IsHTML(true);
$mail->Username = "drksketcher@gmail.com";
$mail->Password = "parvi167";
$mail->SetFrom("drksketcher@gmail.com");
$mail->Subject = "Test";
$mail->Body = "hello";
$mail->AddAddress("drksketcher@gmail.com");
if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message has been sent";
}
?>