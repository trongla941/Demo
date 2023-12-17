<?php
require 'D:\wamp64\www\xamsneaker\mail\PHPMailer\src\Exception.php';
require 'D:\wamp64\www\xamsneaker\mail\PHPMailer\src\PHPMailer.php';
require 'D:\wamp64\www\xamsneaker\mail\PHPMailer\src\SMTP.php';
// require_once 'C:\xampp\htdocs\Xamsneaker\admin\model\pdo.php';
// require_once 'C:\xampp\htdocs\Xamsneaker\admin\model\cart.php';
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

extract($bill);
try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'diepbaokhanh1811@gmail.com';                     //SMTP username
    $mail->Password   = 'ibtdpgbqgimgwpsd';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('diepbaokhanh1811@gmail.com', 'Xamsneaker');
      //Add a recipient
      $mail->addAddress($bill['bill_email'], $bill['bill_name']);
      //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('diepbaokhanh1811@gmail.com','Xamsneaker');
    $mail->addBCC('diepbaokhanh1811@gmail.com','Xamsneaker');

    // //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    // $mail->isHTML(true);            
    $mail->isHTML(true);                      //Set email format to HTML
    $mail->Subject = 'Confirm order ' . $bill['id'] . ' by Xamsneaker!';
    $mail->Body = '<p>Cảm ơn <strong>' . $bill['bill_name'] . '</strong> đã đặt hàng tại <strong>Xamsneaker</strong>!</p>';
    $mail->Body .= '<p>---------Thông tin đơn hàng----------</p>';  
    $mail->Body .= '<p>Mã dơn hàng: <strong>' . $bill['id'] . '</strong></p>';
    $mail->Body .= '<p>Tổng số tiền: <strong>' . $bill['toltal'] . ' VND</strong></p>';
    $mail->Body .= '<p>---------Thông tin nhận hàng----------</p>'; 
    $mail->Body .= '<p>Người nhận hàng: <strong>' . $bill['bill_name'] . '</strong></p>';
    $mail->Body .= '<p>Địa chỉ nhận hàng: <strong>' . $bill['bill_address'] . '</strong></p>';
    $mail->Body .= '<p>Số điện thoại nhận hàng: <strong>' . $bill['bill_tel'] . '</strong></p>';
    $mail->isHTML(true);
   $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
     echo 'Message has been sent';
    echo $bill['bill_name'];
    echo  $bill['bill_email'];
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
