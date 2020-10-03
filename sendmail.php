<?php

if(isset($_POST['message']))
{
        $to   = $_POST['sender_email'];
     $subject = $_POST['subject']; 
      //$phone  = $_POST['phone'];
    $message  = $_POST['message']."<br><br><br><br>Mr./Mrs.".$_POST['sender_name']; 
              
    $headers = "From: ".$_POST['sender_name']." <".$_POST['sender_email'].">\r\n"; $headers = "Reply-To: ".$_POST['sender_email']."\r\n"; 

    $headers = "Content-type: text/html; charset=iso-8859-1\r\n";

            'X-Mailer: PHP/' . phpversion();

             if(mail($to, $subject, $message, $headers)) 

                    echo json_encode(['success'=>true]);

            else 
                    echo json_encode(['success'=>false]);
                    exit;
 }
?>