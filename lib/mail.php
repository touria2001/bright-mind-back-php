<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


   $mail->isSMTP();                                            //Send using SMTP
   $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
   $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
   $mail->Username   = 'touriaa.abbou@gmail.com';                     //SMTP username
   $mail->Password   = 'etipftyllninsioc';                               //SMTP password
   $mail->SMTPSecure = "ssl";            //Enable implicit TLS encryption
   $mail->Port       = 465;  

   $mail->isHTML(true);  
   $mail -> charset = "UTF-8";