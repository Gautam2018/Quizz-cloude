<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class SendMail
{

    public $mail;

    public function __construct()
    {
		$this->mail = new PHPMailer; 
		$this->mail->isSMTP(); 
//
//        
//        $this->mail->Host = get_admin_setting('smtp_host');
//        $this->mail->Port = get_admin_setting('smtp_port'); 
//        $this->mail->SMTPSecure = get_admin_setting('smtp_crypto'); 
//        $this->mail->Username = get_admin_setting('smtp_user');
//        $this->mail->Password = get_admin_setting('smtp_pass');
//        $this->mail->SMTPAuth = true; 
//        $this->mail->Debugoutput = 'html'; 
//        $this->mail->CharSet = 'UTF-8';       
//        
//        $this->mail->Mailer = "SMTP";
        
                $this->mail = new PHPMailer;
                $this->mail->isSMTP();
                $this->mail->SMTPDebug = 2;
                $this->mail->Port = 465;
                $this->mail->SMTPAuth = true;
                $this->mail->SMTPSecure = 'ssl';
                $this->mail->Username = 'AKIA3RE2DGZM47QJHLER';
                $this->mail->Password = 'BBzFwaO1EbAwdEQssDIzPJDnVjmDszJ9tom40g+gah1x';
                $this->mail->Host = 'email-smtp.us-east-1.amazonaws.com';
//                $this->mail->Subject = 'Quiz Cloud Account Verification mail';
//                $this->mail->SMTPAuth = true;
//                $this->mail->SMTPSecure = 'tls';
//                $this->mail->Port = 587;
//                $this->mail->isHTML(true);
                

    }

    public function sendTo($mail_to, $subject, $recipet_name, $message) 
    {
        $this->mail->setFrom('Gautamptl47@gmail.com');
        $this->mail->addAddress($mail_to, $recipet_name);
        $this->mail->isHTML(true); 
        $this->mail->Subject = $subject;
        $this->mail->Body = $message;
        $this->mail->AltBody = "Email Test\r\nThis email was sent through the 
                Amazon SES SMTP interface using the PHPMailer class.";
        if (!$this->mail->send()) 
        {
            log_message('error', 'Mailer Error: ' . $this->mail->ErrorInfo);
            return false;
        }
        return true;
    }

}
