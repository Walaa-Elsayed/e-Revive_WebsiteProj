<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    ini_set("SMTP", "aspmx.l.google.com");
 


    $to = 'walaa@erevive.walaaelsayed.com';

    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $header = "From :".$user_name." Email: ".$user_email;
    
    
    $subject = $_POST['user_subject'];
    $message = $_POST['user_message'];
    
    if(mail($to, $subject, $message, $header)){
        echo "<div class='row p-5 mx-5'> <h2> Message Result </h2> <p class='p-3'> <span style='color:Green ;'> Message sent successfully </span> </p></div>";
    }else{
        echo "<div class='row p-5 mx-5'> <h2> Message Result </h2> <p class='p-3'> <span style='color:red ;'> Could not send your message !</span> </p></div>";
    }

}




?>