<?php
    $to = "hellodivyani@hotmail.com";
    $subject = "This is subject";

    $message = "<b>This is HTML message.</b>";
    $message .= "<h1>This is headline.</h1>";

   // $header = "From:notifydivyani@gmail.com \r\n";
   $header="";
   
   $header .= 'MIME-Version: 1.0' . "\r\n";
$header = 'From: notifydivyani@gmail.com' . "\r\n". 'Reply-To: noreply@abc.co.in' . "\r\n" .'X-Mailer: PHP/' . phpversion();
$header .= 'Content-type : text/html; charset=iso-8859-1' . "\r\n";


    $retval = mail($to,$subject,$message,$header);
    if(isset($retval))//change
    {
        echo "Message sent successfully...";
    }
    else
    {
        echo "Message could not be sent...";
    }
?>