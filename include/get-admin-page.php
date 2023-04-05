

<?php

session_start();

$get_page_name = $_GET['page-name'];
$user_name = $_SESSION['user_name'];

if($user_name){
    get_page($get_page_name);

}else{
    echo 'sorry not allawed';
}




function get_page($get_page_name){

    if(isset($_SERVER['HTTP_REFERER'])) {

        
        header("Location:../".$get_page_name.'.php'); /* Redirect browser */

        exit;

   
    }else{

        header("Location:../".$get_page_name.'.php'); /* Redirect browser */

        exit;
    }
   
    

}



?>