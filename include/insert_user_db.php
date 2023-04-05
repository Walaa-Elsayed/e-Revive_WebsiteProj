<?php

include 'conn.php';

$username= "";
$user_password = "";
$user_email = "";
$return_msg = "";

$username_db ="";

if($_SERVER["REQUEST_METHOD"] == "POST"){


  
    // Get the username and password data from form
    $username= $_POST['user_name'];
    $user_password = $_POST['user_password'];
    $user_email = $_POST['user_email'];

    $return_value = check_validation($username, $user_email, $user_password );

    if ( $return_value == 0) {
        $return_msg = "<p class='py-3'> <span style='color:red ;'> Check your data !</span> </p> ";   
       
    }else{

        
// this code used to check if the username ulready exist in database
    $sql = "SELECT user_name FROM user_profile WHERE user_name = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$username);
    $stmt->bind_result($username_db);
    $stmt->execute();

    if($stmt->fetch()){

        if( $username == $username_db){

            // if the username exist , send error message
            $return_msg = "<p class='py-3'> <span style='color:red ;'> Sorry this username exist in database, plz try again.  </span> </p>";
            // print_r($_SESSION);

        }

    }else{

      // if the username not exist, I will add the new username and password
     
      $sql2 = "INSERT INTO user_profile (user_name, user_password, user_email) VALUES (?, ?, ?)";

      // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
      $password = password_hash($user_password , PASSWORD_DEFAULT);

      $stmt = $conn->prepare($sql2);
      $stmt->bind_param('sss',$username,$password,$user_email);

      if ($stmt->execute()) {

        // send message that the username and password added to database
        $return_msg= " <p class='py-3'> <span style='color:green ;'>  You have successfully registered! You can now login! </span> </p>";
      } else {
        // send message that there are error 
        $return_msg= "<p class='py-3'> <span style='color:red ;'> Error: " . $sql . "<br>" . $conn->error. "</span> </p>";
        }

        
    }

    }


}



function check_validation ($user_name , $user_email , $user_password){

    if (preg_match('/^[A-Za-z]\\w{4,14}+$/', $user_name) == 0) { 
        echo "<p class='pt-3'> <span style='color:red ;'> Username is not valid!'</span> </p> " ;
        echo "<p class='py-1'> <span style='color:red ;'> The number of characters must be between 5 and 15,
        the string should only contain alphanumeric characters and/or underscores (_) and
        the first character of the string should be alphabetic.</span> </p>";

        return 0;

    }elseif (strlen($user_password) > 20 || strlen($user_password) < 5) {
        echo "<p class='py-3'> <span style='color:red ;'> Password must be between 5 and 20 characters long!</span> </p> " ;
        return 0;
    }elseif(!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        echo "<p class='py-3'> <span style='color:red ;'> Email is not valid!</span> </p> ";
        return 0;

    }else{
        return 1;
    }

    

}
