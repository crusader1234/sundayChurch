<?php
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
// require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Email{
    private $hostname =  'premium205.web-hosting.com';
    private $accountUserName = 'admin@kreatextreme.com';
    private $accountpassword = 'iamamponsah@1';
    private $portNumber = 465;
    private $smtp = "ssl";
    private $churchname = "Church of Christ NsawamRoad";


    public function NewUserEmail($userName,$email){

        $mail = new PHPMailer(true);
    
    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                
        $mail->isSMTP();                                   
        $mail->Host       =  $this->hostname;                  
        $mail->SMTPAuth   = true;                                  
        $mail->Username   =  $this->accountUserName;                 
        $mail->Password   =  $this->accountpassword;                 
        $mail->SMTPSecure = $this->smtp;            
        $mail->Port       = $this->portNumber;                        
        //Recipients
        $mail->setFrom($this->accountUserName, $this->churchname);
        //$mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
        $mail->addAddress($email);               //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
    
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content   
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Welcome To '.$this->churchname;
        $mail->Body    = 'Welcome to '.$this->churchname.' online platform. <br>Username:'.$email.' <br> Password: your password';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        return true;
    } catch (Exception $e) {

        return false;
        //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    
        
    }





    public  function NewMemberEmail($churchname,$email,$firstname,$lastname){

        $mail = new PHPMailer(true);
    
     try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'codeedgetech.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'amponsah@codeedgetech.com';                     //SMTP username
        $mail->Password   = 'iamamponsah@1';                               //SMTP password
        $mail->SMTPSecure = "ssl";            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('amponsah@kreatextreme.com', 'Sunday Church Management System');
        //$mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
        $mail->addAddress($email);               //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
    
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content   
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Welcome';
        $mail->Body    = "";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    
        
    }




}








