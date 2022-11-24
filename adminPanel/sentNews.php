<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Letter</title>

    

</head>



<body class="body"> -->








<?php

include_once "../connect.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../php mailer/vendor/autoload.php';

$mail = new PHPMailer(true);

$query = $connect->prepare("SELECT * from internaute");
$query->execute();
$results = $query->fetchAll();

$sql = $connect->prepare("SELECT * FROM news ORDER BY date_pub DESC limit 1");
$sql->execute();

$news = $sql->fetch();

// echo "<pre>";
// print_r($results);
// echo "</pre>";

foreach ($results as $result) {
    try {
        
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'hamzaeraoui2000@gmail.com';            // SMTP username
        $mail->Password   = 'hamza123456789';                       // SMTP password
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom($result['email_inter'], $result['nom_inter'] . " " . $result['prenom_inter']);
        $mail->addAddress($result['email_inter'], $result['nom_inter'] . " " . $result['prenom_inter']);     // Add a recipient


        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = "Votre article de ce jours et delivrer par Rinho";
        $mail->Body    = "<div style='font-weight:bold;margin:10px auto;padding:15px;font-size:22px;'>"
                        . $news['titre'] .
                        "</div>".
                          "<div style='margin:10px 20px;color:black;padding:15px;background-color:#EEE;width:80%;'>"
                        . $news['content'] .
                        "</div>";

        $mail->send();
        header("location:dashboard.php");
    } catch (Exception $e) {
        echo "<div class='alert alert-danger'>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</div></br>";
    }
}


?>


<!-- </body> -->