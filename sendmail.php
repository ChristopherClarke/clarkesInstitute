<?php
    require 'vendor/autoload.php';

    class SendEmail{

        public static function sendMail($to, $subject, $content){
            //no key from sendgrid
            $key = 'no key available';
            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("christopher.clarke73@yahoo.com", "Clarkes Institute");
            $email->SetSubject($subject);
            $email->addTo($to);
            $email->addContent("text/plain", $content);
            $sendGrid = new \SendGrid($key);

            try{
                $response = $sendGrid->send($email);
                return $response;
            }
            catch(Exception $e){
                echo 'Email exception Caught: '.$e->getMessage() ."\n";
                return false;
            }

        }
    }

?>