<?php



if( session_start()) {
    
    if($_SESSION['user_name']){

        unset($_SESSION['user_name']);
        session_destroy();

        header("Location:../index.php"); /* Redirect browser */

        exit;


    }else{

        echo 'you are already sign out';

    }
} else {
    header("Location:../not-allawed-page.php"); /* Redirect browser */

    exit;
}






?>
