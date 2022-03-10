<?php

if(isset($_POST['name']) && isset($_POST['email'])){
    $name = $_POST['name'];
    //$email = $_POST['email'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];
    //$file = $_POST['file'];

    // echo "1 step done";

    require_once 'vendor/autoload.php';

            // Create the Transport
        $transport = (new Swift_SmtpTransport('smtp.googlemail.com', 465,'ssl' ))
        ->setUsername('sumitsem2468@gmail.com')
        ->setPassword('#sumit2468')
        ;

        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // file
        if(isset($_FILES['file'])){
            $message->attach(Swift_Attachment::fromPath($_FILES['file']['tmp_name'])->setFilename('php.jpg'));
        }

        // Create a message
        $message = (new Swift_Message($subject))
        ->setFrom(['sumitsem2468@gmail.com' => $name])
        ->setTo([$email])
        ->setBody($body);

        // Send the message
        //harshprogrammer782
        $result = $mailer->send($message);


    if ($mail->send()){
        $status = "success";
        $response = "email is sent";
    }
     else{ $response =  "somthing is wrong : " . $mail->ErrorInfo ;
        $status = "failed";
    }
     exit(json_encode(array( "status"=>$status,"response" => $response)));
}

?>