<?php
require "../base/koneksi.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["submit"])){
    // Cek berhasil atau tidak menambah data
if (kirim_pesan ($_POST) > 0) {
}else {
}
$mail = new PHPMailer(true);

$mail-> isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'cuciberkelaz@gmail.com';
$mail->Password = 'pgtqcbtneqoimvlf';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->setFrom($_POST["email"]);

$mail->addAddress('cuciberkelaz@gmail.com');
$mail->Sender = $_POST["email"];
$mail->From = $_POST["email"];
$mail->FromName = $_POST["email"];

$mail->isHTML(true);


$mail->Subject = $_POST["subject"];
$mail->Body = "Nama Pengirim : ".$_POST["name"]."<br>"."Username : ".$_POST["username"]."<br>"."Email Pengirim : ".$_POST["email"]."<br>"."Pesan : ".$_POST["message"];

$mail->send();

echo
"
<script>
alert('Pesan Berhasil Dikirim');
document.location.href = '../index.php';
</script>
";
}
?>

