<?php
$receiver = "hamzarjb7@gmail.com";
$subject = "Email Test via PHP using Localhost";
$body = "Hi, there...This is a test email sent from Localhost.";


if(mail($receiver, $subject, $body)){
    echo "Email sent successfully to $receiver";
}else{
    echo "Sorry, failed while sending mail!";
}
?>