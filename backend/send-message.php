<?php
include 'smtp/PHPMailerAutoload.php';
$msg = $_GET['message'];
$to_email_address = 'meetnayak6419@gmail.com'; // Mail will send to this Email Address
$subject = $_GET['subject']; // Subject
$name = $_GET['name']; //
$email = $_GET['email'];

echo sendMail($to_email_address, $subject, $msg, $name, $email);
function sendMail($to, $subject, $msg, $name, $email)
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
    $mail->Password = "bfzq ixha smra pnhy"; // Your Mail App Password
    $mail->SetFrom("meetnayak6419@gmail.com"); // Mail will Send from This Email Address
    $mail->Subject = $subject;
    $mail->Body = $name . '<br> Email ID : ' . $email . '<br> Message : ' . $msg;
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
