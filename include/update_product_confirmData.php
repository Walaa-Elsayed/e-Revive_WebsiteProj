<?php

include 'include/conn.php';

// this is the return message when the product already exist in database
$return_msg = "";


if (session_status() !== PHP_SESSION_ACTIVE) {

    session_start();
}


if (isset($_SESSION['user_name']) && $_SESSION['user_id']) {

    // get product id 
    $product_id = $_POST['product_id'];
    // get user information
    $user_name = $_SESSION['user_name'];
    $user_id = $_SESSION['user_id'];


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // first get the product data values 
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_category = intval($_POST['product_category']);
        $select_brand = intval($_POST['select_brand']);
        $product_age = intval($_POST['product_age']);
        $product_condition = intval($_POST['product_condition']);
        $PaymentMethod = intval($_POST['PaymentMethod']);
        $product_desc = $_POST['product_desc'];
        // get the current date
        $upload_date = date('Y-m-d H:i:s');

        // this is the attributes used to get product name from database
        $product_name_db = "";

        // this attributes used to get image upload data
        $filename = $_FILES["uploadfile"]["name"];


        if ($filename) {

            $tempname = $_FILES["uploadfile"]["tmp_name"];
            $folder = "./images/" . $filename;
            $product_image_ext = $filename;


            if (!move_uploaded_file($tempname, $folder)) {
                echo "<h3>  Failed to upload image!</h3>";
            }


            //Update product data with upload new image 
            $sql_update = "UPDATE product SET product_name = ?, product_price= ? , upload_date= ?, product_image= ?, age= ? , user_id= ? , category_id= ? , brand_id= ? , condition_id= ? , paymentype_id= ? , product_description= ? WHERE product_id =" . $product_id;

            $stmt_update = $conn->prepare($sql_update);
            $stmt_update->bind_param('sdssiiiiiis', $product_name, $product_price, $upload_date, $product_image_ext, $product_age, $user_id, $product_category, $select_brand, $product_condition, $PaymentMethod, $product_desc);

            if ($stmt_update->execute()) {

                // send message that the username and password added to database
                $return_msg = " <p class='py-3'> <span style='color:green ;'>  Your product updated successfully </span> </p>";
            } else {
                // send message that there are error 
                $return_msg = "<p class='py-3'> <span style='color:red ;'> Error: " . $sql . "<br>" . $conn->error . "</span> </p>";
            }
        } else {

            //Update product data without upload new image 
            $sql_update = "UPDATE product SET product_name = ?, product_price= ? , upload_date= ?, age= ? , user_id= ? , category_id= ? , brand_id= ? , condition_id= ? , paymentype_id= ? , product_description= ? WHERE product_id =" . $product_id;
            $stmt_update = $conn->prepare($sql_update);
            $stmt_update->bind_param('sdsiiiiiis', $product_name, $product_price, $upload_date, $product_age, $user_id, $product_category, $select_brand, $product_condition, $PaymentMethod, $product_desc);

            if ($stmt_update->execute()) {

                // send message that the username and password added to database
                $return_msg = " <p class='py-3'> <span style='color:green ;'>  Your product updated successfully </span> </p>";
            } else {
                // send message that there are error 
                $return_msg = "<p class='py-3'> <span style='color:red ;'> Error: " . $sql . "<br>" . $conn->error . "</span> </p>";
            }
        }
    }
} else {
    header("Location:../not-allawed-page.php"); /* Redirect browser */

    exit;
}
