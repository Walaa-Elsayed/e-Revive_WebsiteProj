<?php

include 'conn.php';

$username= "";
$user_password = "";
$user_email = "";
$return_msg = "";

$username_db ="";
$password_db="";
$user_id_db="";



if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username= $_POST['user_name'];
    $user_password = $_POST['user_password'];
    echo  $user_password;


    $sql = "SELECT user_id, user_name, user_password FROM user_profile WHERE user_name = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$username);
    $stmt->bind_result($user_id_db,$username_db,$password_db);
    $stmt->execute();

    if($stmt->fetch()){ 

        

        if( $username == $username_db && password_verify($user_password,$password_db)){

            session_start();
            $_SESSION['user_id'] = $user_id_db;
            $_SESSION['user_name'] = $username_db;

            header("Location:index.php");
            exit;
           

        }else{
            $return_msg = "<p class='py-3'> <span style='color:red ;'> Sorry, Check your username and password again! </span> </p>";
        }

    }else{
        $return_msg = "<p class='py-3'> <span style='color:red ;'> Sorry, could not find your username! </span> </p> ";
    }


    $stmt->close();
    $conn->close();


}
