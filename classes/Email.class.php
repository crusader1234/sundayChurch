<?php
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
// require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Email{

    private $hostname =  'marwako.com';
    private $accountUserName = 'amponsah@codeedgetech.com';
    private $accountpassword = 'iamamponsah@1';
    private $portNumber = 465;
    private $smtp = "ssl";
    private $churchname = "Church of Christ";


    public function NewUserEmail($email,$password){

        $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       =  $this->hostname;                   //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   =  $this->accountUserName;                   //SMTP username
        $mail->Password   =  $this->accountpassword;                              //SMTP password
        $mail->SMTPSecure = $this->smtp;            //Enable implicit TLS encryption
        $mail->Port       = $this->portNumber;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
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
        $mail->Body    = '      
              
        <p style="font-size: 14px; line-height: 140%;"><span style="font-size: 34px; line-height: 47.6px;"><strong><span style="line-height: 47.6px; font-size: 34px;">'.$this->churchname.'</span></strong></span></p>
        
        <p style="font-size: 14px; line-height: 140%;"><span style="font-size: 20px; line-height: 28px;"><strong><span style="line-height: 28px; font-size: 20px;">Welcome '.$this->churchname.'</span></strong></span></p>
        <p style="font-size: 14px; line-height: 140%;"><span style="font-size: 20px; line-height: 28px;"><strong><span style="line-height: 28px; font-size: 16px;">You have Successfully signed up to our online membership Platform.</span></strong></span></p>
        <p style="font-size: 12px; line-height: 140%;"><span style="font-size: 16px; line-height: 20px;"><strong><span style="line-height: 28px; font-size: 16px;text-align:left;">Username:'.$email.' <br> Password:'.$password.'</span></strong></span></p>
        
            <p style="font-size: 14px; line-height: 140%;"><strong><span style="font-size: 12px; line-height: 16.8px;">&copy;'.$this->churchname.'&nbsp; -&nbsp; All Rights Reserved </span></strong></p>
          ';
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
        $mail->Body    = ' <!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
        <head>
          
          
            <style type="text/css">
              table, td { color: #000000; } a { color: #57578a; text-decoration: none; }
        @media only screen and (min-width: 620px) {
          .u-row {
            width: 600px !important;
          }
          .u-row .u-col {
            vertical-align: top;
          }
        
          .u-row .u-col-100 {
            width: 600px !important;
          }
        
        }
        
        @media (max-width: 620px) {
          .u-row-container {
            max-width: 100% !important;
            padding-left: 0px !important;
            padding-right: 0px !important;
          }
          .u-row .u-col {
            min-width: 320px !important;
            max-width: 100% !important;
            display: block !important;
          }
          .u-row {
            width: calc(100% - 40px) !important;
          }
          .u-col {
            width: 100% !important;
          }
          .u-col > div {
            margin: 0 auto;
          }
        }
        body {
          margin: 0;
          padding: 0;
        }
        
        table,
        tr,
        td {
          vertical-align: top;
          border-collapse: collapse;
        }
        
        p {
          margin: 0;
        }
        
        .ie-container table,
        .mso-container table {
          table-layout: fixed;
        }
        
        * {
          line-height: inherit;
        }
        
        a[x-apple-data-detectors="true"] {
          color: inherit !important;
          text-decoration: none !important;
        }
        
        </style>
          
          
        
        <!--[if !mso]><!--><link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet" type="text/css"><!--<![endif]-->
        
        </head>
        
        <body class="clean-body" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #e7e7e7;color: #000000">
          <!--[if IE]><div class="ie-container"><![endif]-->
          <!--[if mso]><div class="mso-container"><![endif]-->
          <table style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #e7e7e7;width:100%" cellpadding="0" cellspacing="0">
          <tbody>
          <tr style="vertical-align: top">
            <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color: #e7e7e7;"><![endif]-->
            
        
        <div class="u-row-container" style="padding: 0px;background-color: transparent">
          <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
            <div style="border-collapse: collapse;display: table;width: 100%;background-image: url("images/image-7.png");background-repeat: no-repeat;background-position: center top;background-color: transparent;">
        <div class="u-col u-col-100" style="max-width: 320px;min-width:600px;display:table-cell;vertical-align:top;">
          <div style="width: 100% !important;">
         <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
          
        <table style="font-family:"Montserrat",sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
          <tbody>
            <tr>
              <td style="overflow-wrap:break-word;word-break:break-word;padding:60px 10px 20px;font-family:"Montserrat",sans-serif;" align="left">
                
        <table width="100%" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <td style="padding-right: 0px;padding-left: 0px;" align="center">
              
              <img align="center" border="0" src="images/image-6.png" alt="Image" title="Image" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 28%;max-width: 162.4px;" width="162.4"/>
              
            </td>
          </tr>
        </table>
        
              </td>
            </tr>
          </tbody>
        </table>
        
        <table style="font-family:"Montserrat",sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
          <tbody>
            <tr>
              <td style="overflow-wrap:break-word;word-break:break-word;padding:18px 10px 10px;font-family:"Montserrat",sans-serif;" align="left">
                
          <div style="color: #26052c; line-height: 140%; text-align: center; word-wrap: break-word;">
            <p style="font-size: 14px; line-height: 140%;"><span style="font-size: 34px; line-height: 47.6px;"><strong><span style="line-height: 47.6px; font-size: 34px;">Church_name</span></strong></span></p>
        <p style="font-size: 14px; line-height: 140%;">&nbsp;</p>
        <p style="font-size: 14px; line-height: 140%;"><span style="font-size: 20px; line-height: 28px;"><strong><span style="line-height: 28px; font-size: 20px;">Welcome '.$lastname.' '.$firstname.'</span></strong></span></p>
        <p style="font-size: 14px; line-height: 140%;"><span style="font-size: 20px; line-height: 28px;"><strong><span style="line-height: 28px; font-size: 20px;">You have Successfully Joined '.$churchname.'</span></strong></span></p>
        <p style="font-size: 14px; line-height: 140%;">&nbsp;</p>
          </div>
        
              </td>
            </tr>
          </tbody>
        </table>
        
        <table style="font-family:
        "Montserrat
        ",sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
          <tbody>
            <tr>
              <td style="overflow-wrap:break-word;word-break:break-word;padding:20px 10px 29px;font-family:"Montserrat",sans-serif;" align="left">
                
          <div style="color: #d62424; line-height: 200%; text-align: center; word-wrap: break-word;">
            <p style="font-size: 14px; line-height: 200%;"><span style="font-size: 16px; line-height: 32px;">Intimate live performance</span></p>
        <p style="font-size: 14px; line-height: 200%;"><span style="font-size: 16px; line-height: 32px;">Exclusive interview + Q&amp;A</span></p>
        <p style="font-size: 14px; line-height: 200%;"><span style="font-size: 16px; line-height: 32px;">Thunder series jazzmaster giveaway</span></p>
          </div>
        
              </td>
            </tr>
          </tbody>
        </table>
        
         </div>
          </div>
        </div>
            </div>
          </div>
        </div>
        
        
        
        <div class="u-row-container" style="padding: 0px;background-color: transparent">
          <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #e5e6ea;">
            <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
        <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
          <div style="width: 100% !important;">
         <div style="padding: 9px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]-->
          
        <table style="font-family:"Montserrat",sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
          <tbody>
            <tr>
              <td style="overflow-wrap:break-word;word-break:break-word;padding:32px 4px 4px;font-family:"Montserrat",sans-serif;" align="left">
                
        <div align="center">
          <div style="display: table; max-width:274px;">
            <table align="left" border="0" cellspacing="0" cellpadding="0" width="32" height="32" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;margin-right: 23px">
              <tbody><tr style="vertical-align: top"><td align="left" valign="middle" style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                <a href=" " title="Facebook" target="_blank">
                  <img src="images/image-4.png" alt="Facebook" title="Facebook" width="32" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important">
                </a>
              </td></tr>
            </tbody></table>
            <table align="left" border="0" cellspacing="0" cellpadding="0" width="32" height="32" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;margin-right: 23px">
              <tbody><tr style="vertical-align: top"><td align="left" valign="middle" style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                <a href=" " title="Twitter" target="_blank">
                  <img src="images/image-5.png" alt="Twitter" title="Twitter" width="32" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important">
                </a>
              </td></tr>
            </tbody></table>
            <table align="left" border="0" cellspacing="0" cellpadding="0" width="32" height="32" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;margin-right: 23px">
              <tbody><tr style="vertical-align: top"><td align="left" valign="middle" style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                <a href=" " title="LinkedIn" target="_blank">
                  <img src="images/image-3.png" alt="LinkedIn" title="LinkedIn" width="32" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important">
                </a>
              </td></tr>
            </tbody></table>
            <table align="left" border="0" cellspacing="0" cellpadding="0" width="32" height="32" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;margin-right: 23px">
              <tbody><tr style="vertical-align: top"><td align="left" valign="middle" style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                <a href=" " title="Instagram" target="_blank">
                  <img src="images/image-1.png" alt="Instagram" title="Instagram" width="32" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important">
                </a>
              </td></tr>
            </tbody></table>
            <table align="left" border="0" cellspacing="0" cellpadding="0" width="32" height="32" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;margin-right: 0px">
              <tbody><tr style="vertical-align: top"><td align="left" valign="middle" style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                <a href=" " title="YouTube" target="_blank">
                  <img src="images/image-2.png" alt="YouTube" title="YouTube" width="32" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important">
                </a>
              </td></tr>
            </tbody></table>
          </div>
        </div>
        
              </td>
            </tr>
          </tbody>
        </table>
        
        <table style="font-family:"Montserrat",sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
          <tbody>
            <tr>
              <td style="overflow-wrap:break-word;word-break:break-word;padding:19px 10px 10px;font-family:"Montserrat",sans-serif;" align="left">
                
          <div style="color: #444444; line-height: 140%; text-align: left; word-wrap: break-word;">
            <p style="line-height: 140%; text-align: center; font-size: 14px;"><strong>Sunday Church Management System</strong></p>
          </div>
        
              </td>
            </tr>
          </tbody>
        </table>
        
        <table style="font-family:"Montserrat",sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
          <tbody>
            <tr>
              <td style="overflow-wrap:break-word;word-break:break-word;padding:10px 40px;font-family:"Montserrat",sans-serif;" align="left">
                
          <div style="color: #666666; line-height: 140%; text-align: center; word-wrap: break-word;">
            <p style="font-size: 14px; line-height: 140%;"><span style="font-size: 12px; line-height: 16.8px;">Address line, email address , phone number, etc goes here.</span></p>
        <p style="font-size: 14px; line-height: 140%;"><span style="font-size: 12px; line-height: 16.8px;">Contact Us&nbsp; /&nbsp; Privacy Policy&nbsp; /&nbsp; Unsubscribe&nbsp; /&nbsp; Terms</span></p>
          </div>
        
              </td>
            </tr>
          </tbody>
        </table>
        
        <table style="font-family:"Montserrat",sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
          <tbody>
            <tr>
              <td style="overflow-wrap:break-word;word-break:break-word;padding:10px 40px;font-family:"Montserrat",sans-serif;" align="left">
                
          <div style="line-height: 140%; text-align: center; word-wrap: break-word;">
            <p style="font-size: 14px; line-height: 140%;"><strong><span style="font-size: 12px; line-height: 16.8px;">&copy;'.$churchname.'&nbsp; -&nbsp; All Rights Reserved </span></strong></p>
          </div>
        
              </td>
            </tr>
          </tbody>
        </table>
        
        <table style="font-family:"Montserrat",sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
          <tbody>
            <tr>
              <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:"Montserrat",sans-serif;" align="left">
                
          <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #f8f8f8;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
            <tbody>
              <tr style="vertical-align: top">
                <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                  <span>&#160;</span>
                </td>
              </tr>
            </tbody>
          </table>
        
              </td>
            </tr>
          </tbody>
        </table>
        
         </div>
          </div>
        </div>
            </div>
          </div>
        </div>
        
        
            </td>
          </tr>
          </tbody>
          </table>
        </body>
        
        </html>
         ';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    
        
    }




}








