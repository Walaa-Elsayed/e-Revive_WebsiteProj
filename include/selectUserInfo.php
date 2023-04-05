<?php

include 'conn.php';

$user_info;
$user_name;

if (session_status() !== PHP_SESSION_ACTIVE) {

    session_start();
            
}


if (isset($_SESSION['user_name']) && $_SESSION['user_id']) {

    $user_name = $_SESSION['user_name'];
    $user_id = $_SESSION['user_id'];


    $sql = "SELECT * FROM user_profile WHERE user_id= $user_id"; // SQL with parameters
    $stmt = $conn->prepare($sql);

    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $user_info = $row['more_info'];
        $user_image = $row['user_image'];
        $user_address = $row['address'];
        

        if ($user_info == NULL) {

            $user_info = 'No More Information Available ...';   
        }

        if($user_image == NULL){
            $user_image= 'user.png';
        }
    }
} else {
    header("Location:../not-allawed-page.php"); /* Redirect browser */

    exit;
}


?>
