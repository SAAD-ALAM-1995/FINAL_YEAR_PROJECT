<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

$conn = mysqli_connect("localhost","root","","professional_connect");
$email=$_REQUEST["email"];
$query="SELECT * FROM customer WHERE EMAIL = '$email'";
$res = mysqli_query($conn, $query);
$row=mysqli_fetch_array($res);


$mail = new PHPMailer(true);

try {
  
    $mail->SMTPDebug = 0;                     
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                    
    $mail->SMTPAuth   = true;                                  
    $mail->Username   = 'mustafahassan12at@gmail.com';                    
    $mail->Password   = 'Mustafa_1998';                              
    $mail->SMTPSecure = 'tls';         
    $mail->Port       = 587;                                   

    
    $mail->setFrom('mustafahassan12at@gmail.com', 'Mustafa Ibn Ajaz');
    $mail->addAddress($row["EMAIL"], $row["CUSTOMER_NAME"]);     
  
    $mail->isHTML(true);                                 
    $mail->Subject = 'Forgot Password from PrfessionalConnect';
    $mail->Body    = 'This is a your account password '.md5($row["PASSWORD"]);
    $mail->AltBody = 'This is a your account password';
        
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}