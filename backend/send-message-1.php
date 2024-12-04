<?php
include 'smtp/PHPMailerAutoload.php';
$name = $_POST['name'];
$phone = $_POST['phone'];
$html = $_POST['message'];
$to_email_address = 'meeetnayak6419@gmail.com'; // Mail will send to this Email Address
//$subject = $_POST['subject']; // Subject
echo smtp_mailer($to_email_address, $subject, $html);
function smtp_mailer($to, $subject, $msg)
{
    $mail = new PHPMailer();
    $mail->SMTPDebug = 3;
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Username = "meetnayak6419@gmail.com"; // Mail will Send from This Email Address
    $mail->Password = "oekcrklbmlvzhbmw"; // Your Mail App Password
    $mail->SetFrom("meetnayak6419@gmail.com"); // Mail will Send from This Email Address
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);
    $mail->SMTPOptions = array('ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => false,
    ));
    if (!$mail->Send()) {
        echo $mail->ErrorInfo;
    } else {
        return 'Sent';
    }
}
