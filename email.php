<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title></title>

</head>
<body>

<?php
echo "<h2>Laiškas siunčiamas</h2>";
$name = $_GET['firstname'];
print_r($_GET);
$klientoVardas = $_GET['firstname'];
$klientoElpastas = $_GET['email'];
$klientoklausimas = $_GET['question'];


require_once "lib/email/PHPMailer-master/PHPMailerAutoload.php";

$mail = new PHPMailer;

$mail->SMTPDebug = 0;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'mankstakunui@gmail.com';                 // SMTP username
$mail->Password = 'mankstinkis';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom($klientoElpastas, $klientoVardas);
$mail->addAddress('mankstakunui@gmail.com', 'manksta.lt');     // Add a recipient
// $mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo($klientoElpastas);
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'klausimas';
// senas: $mail->Body    = '<h1>Apziurejau jusu parduotuve ir iskilo klausimas</h1> <b>svarbu!</b>';
$mail->Body    = $klientoklausimas;
// senas: $mail->AltBody = 'Apziurejau jusu parduotuve ir iskilo klausimas \n : Kiek kainuoja...';
// $mail->AltBody = 'Sveiki, norejau gauti mankstu \n ';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

?>
</body>

</html>
