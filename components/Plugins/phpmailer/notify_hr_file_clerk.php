<?php
include '../../../function/conn.php';
// $email = $_POST['requestor'];
$section = $_POST['section'];
$subSection = $_POST['subSection'];
$uploader = $_POST['uploader'];
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';
$mail = new PHPMailer(true);
// / EMAIL PROCESS
try {
    //Server settings
    $mail->SMTPDebug = 1;                      
    $mail->isSMTP();                                          
    $mail->Host       = 'smtp.gmail.com';                    
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'falpsystemgroup2019@gmail.com';                    
    $mail->Password   = 'FALPIT-SYS2019';                              
    $mail->SMTPSecure = 'tls';        
    $mail->Port       = 587;     

    //Recipients
    $mail->setFrom('falpsystemgroup2019@gmail.com', 'HR Absenteeism Report System');
    $mail->addAddress('rubyanne.cabilin.pasahol@furukawaelectric.com', ''); 
    // $mail->addAddress('aison.silan.cabusay@furukawaelectric.com'); 
    // $mail->addCC('','');
    $mail->addReplyTo('no-reply@gmail.com', 'No-Reply');
 
    // Content
    $mail->isHTML(true);     
    $mail->Subject = 'HR Absenteeism Report Information System Notification';
    $mail->Body    = 
                    'Health and Safety First!<br>     
                    <br>'.$uploader.' successfully filed an absent report for '.$section.'/'.$subSection.' at '.$server_date_time.'.
                    <br>
                    <br>
                    &mdash; HR Absenteeism Report Information Management System (HR-ARIS)
                    <br>
                    <b>This is system generated mail. Please do not reply!</b>
                    <p style="font-size:10px;font-family:arial;">
                    Furukawa Automotive System Lima Philippines
                    </p>
                    ';
    $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>