<?php

include 'include/conn.php';

// this is the return message when the product already exist in database
$return_msg = "";


if (session_status() !== PHP_SESSION_ACTIVE) {

    session_start();
}


if (isset($_SESSION['user_name']) && $_SESSION['user_id']) {

    // get user information
    $user_name = $_SESSION['user_name'];
    $user_id = $_SESSION['user_id'];
    $new_password_db = "";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_address = $_POST['user_address'];
        $user_info = $_POST['user_info'];
        $user_birthdate = $_POST['user_birthdate'];

        // get the password value 
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];


        // update user password
        if ($new_password != "") {
            if ($confirm_password != "") {

                if ($confirm_password === $new_password) {

                    // Validate password

                    if (strlen($confirm_password) > 20 || strlen($confirm_password) < 5) {
                        $return_msg = $return_msg . " Password must be between 5 and 20 characters long!";
                    }else{

                        $sql_update_userPassword = "UPDATE user_profile SET user_password = ? WHERE user_id =" . $user_id;
       
                        $stmt_update = $conn->prepare($sql_update_userPassword);

                        // secure password in database
                        $password = password_hash($new_password, PASSWORD_DEFAULT);
                        $stmt_update->bind_param('s', $password);
    
                        if ($stmt_update->execute()) {
    
                            // send message 
                            $return_msg = $return_msg . " <p class='py-2'> <span style='color:green ;'>  Your profile password updated successfully </span> </p>";
                        } else {
                            // send message that there are error 
                            $return_msg = $return_msg . "<p class='py-2'> <span style='color:red ;'> Error: " . $sql . "<br>" . $conn->error . "</span> </p>";
                        }

                    }

                   
                } else {
                    echo "<p class='py-2'> <span style='color:red ;'> Sorry, the entered password is not the same, try again !! </span> </p>" ;
                    
                }
            } else {
                echo "<p class='py-2'> <span style='color:red ;'> You need to confirm the new password </span> </p>";
            }
        }


        $filename = $_FILES["uploadfile"]["name"];

        // update user image
        if (isset($filename) && !empty($filename)) {

            $tempname = $_FILES["uploadfile"]["tmp_name"];
            $folder = "./images/" . $filename;
            $user_image_ext = $filename;


        


            if (!move_uploaded_file($tempname, $folder)) {
                echo "<h3>  Failed to upload image!</h3>";
            }


            $sql_update_userImage = "UPDATE user_profile SET user_image = ? WHERE user_id =" . $user_id;



            $stmt_update = $conn->prepare($sql_update_userImage);
            $stmt_update->bind_param('s', $user_image_ext);

            if ($stmt_update->execute()) {

                // send message 
                $return_msg = $return_msg . " <p class='py-1'> <span style='color:green ;'>  Your profile image updated successfully </span> </p>";
            } else {
                // send message that there are error 
                $return_msg = $return_msg . "<p class='py-1'> <span style='color:red ;'> Error: " . $sql . "<br>" . $conn->error . "</span> </p>";
            }
        }


        // update username
        if (isset($user_name)) {

            $sql_update_userName = "UPDATE user_profile SET user_name = ? WHERE user_id =" . $user_id;

            $stmt_update = $conn->prepare($sql_update_userName);
            $stmt_update->bind_param('s', $user_name);

            if ($stmt_update->execute()) {

                // send message 
                $return_msg = $return_msg ." <p class='py-1'> <span style='color:green ;'>  Your username updated successfully </span> </p>";
            } else {
                // send message that there are error 
                $return_msg = $return_msg . "<p class='py-1'> <span style='color:red ;'> Error: " . $sql . "<br>" . $conn->error . "</span> </p>";
            }
        }


        // update username
        if (isset($user_email)) {

            $sql_update_userEmail = "UPDATE user_profile SET user_email = ? WHERE user_id =" . $user_id;

            $stmt_update = $conn->prepare($sql_update_userEmail);
            $stmt_update->bind_param('s', $user_email);

            if ($stmt_update->execute()) {

                // send message 
                $return_msg = $return_msg . " <p class='py-1'> <span style='color:green ;'>  Your user email updated successfully </span> </p>";
            } else {
                // send message that there are error 
                $return_msg = $return_msg . "<p class='py-1'> <span style='color:red ;'> Error: " . $sql . "<br>" . $conn->error . "</span> </p>";
            }
        }


        // update user address
        if (isset($user_address)) {

            $sql_update_userAddress = "UPDATE user_profile SET `address` = ? WHERE user_id =" . $user_id;

            $stmt_update = $conn->prepare($sql_update_userAddress);
            $stmt_update->bind_param('s', $user_address);

            if ($stmt_update->execute()) {

                // send message 
                $return_msg = $return_msg . " <p class='py-1'> <span style='color:green ;'>  Your user address updated successfully </span> </p>";
            } else {
                // send message that there are error 
                $return_msg = $return_msg . "<p class='py-1'> <span style='color:red ;'> Error: " . $sql . "<br>" . $conn->error . "</span> </p>";
            }
        }


         // update user information
         if (isset($user_info)) {

            $sql_update_userInfo = "UPDATE user_profile SET more_info = ? WHERE user_id =" . $user_id;

            $stmt_update = $conn->prepare($sql_update_userInfo);
            $stmt_update->bind_param('s', $user_info);

            if ($stmt_update->execute()) {

                // send message 
                $return_msg = $return_msg . " <p class='py-1'> <span style='color:green ;'>  Your user information updated successfully </span> </p>";
            } else {
                // send message that there are error 
                $return_msg = $return_msg . "<p class='py-1'> <span style='color:red ;'> Error: " . $sql . "<br>" . $conn->error . "</span> </p>";
            }
        }


        // update user birthdate
        if (isset($user_birthdate)) {

            $sql_update_userBirthdate = "UPDATE user_profile SET user_birthdate = ? WHERE user_id =" . $user_id;

            $stmt_update = $conn->prepare($sql_update_userBirthdate);
            $stmt_update->bind_param('s', $user_birthdate);

            if ($stmt_update->execute()) {

                // send message 
                $return_msg = $return_msg . " <p class='py-1'> <span style='color:green ;'>  Your user birthdate updated successfully </span> </p>";
            } else {
                // send message that there are error 
                $return_msg = $return_msg . "<p class='py-1'> <span style='color:red ;'> Error: " . $sql . "<br>" . $conn->error . "</span> </p>";
            }
        }




        

    }
} else {
    header("Location:../not-allawed-page.php"); /* Redirect browser */

    exit;
}
