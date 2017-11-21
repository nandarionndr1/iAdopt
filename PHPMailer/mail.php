<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';

if (isset($_POST['submitEmail'])){
    $senderEmail = $_POST['senderEmail'];
    $sender = curl_getByEmail('/db/accounts/', $senderEmail);
    $senderName = $sender['name'];
    $receiverEmail = $_POST['receiverEmail'];
    $receiver = curl_getByEmail('/db/accounts/', $receiverEmail);
    $receiverName = $receiver['name'];
    $subject = 'iAdopt - Adoption Intent';
    $message = 'Good day! '.$senderName.' is interested in your pet! You can reply to this message to send an email or wait for '.$senderName.' to send you a message. Thank you for using iAdopt.';
    $message2 = "Good day! Thank you for your interest in ".$receiverName."'s pet. You can reply to this message in order to communicate with ".$receiverName." or you can send a message through ".$receiverEmail;
    
    if(isset($senderName) && isset($receiverName)){
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = false;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'iadoptweb@gmail.com';                 // SMTP username
            $mail->Password = 'iadoptweb1';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom($senderEmail, 'iAdopt');
            $mail->addAddress($receiverEmail, $receiverName);     // Add a recipient
            //$mail->addAddress('ellen@example.com');               // Name is optional
            $mail->AddReplyTo($senderEmail, $senderName); //Set recipient when replying
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $message;
            $mail->AltBody = $message;

            $mail->send();
            echo '<script>alert("Message sent!");</script>';
        } catch (Exception $e) {
            echo '<script>alert("Message failed to send!");</script>';
        }
        $mail2 = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail2->SMTPDebug = false;                                 // Enable verbose debug output
            $mail2->isSMTP();                                      // Set mailer to use SMTP
            $mail2->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail2->SMTPAuth = true;                               // Enable SMTP authentication
            $mail2->Username = 'iadoptweb@gmail.com';                 // SMTP username
            $mail2->Password = 'iadoptweb1';                           // SMTP password
            $mail2->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail2->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail2->setFrom('iadoptweb@gmail.com', 'iAdopt');
            $mail2->addAddress($senderEmail, $senderName);     // Add a recipient
            //$mail->addAddress('ellen@example.com');               // Name is optional
            $mail2->AddReplyTo($receiverEmail, $receiverName); //Set recipient when replying
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail2->isHTML(true);                                  // Set email format to HTML
            $mail2->Subject = $subject;
            $mail2->Body    = $message2;
            $mail2->AltBody = $message2;

            $mail2->send();
            echo '<script>alert("Message sent!");</script>';
        } catch (Exception $e) {
            echo '<script>alert("Message failed to send!");</script>';
        }
        
    }
}