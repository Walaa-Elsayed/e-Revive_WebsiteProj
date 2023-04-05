<?php

include 'conn.php';

// this is the return message when the product already exist in database
$return_msg = "";
// $check_result = 0;

if (session_status() !== PHP_SESSION_ACTIVE) {

    session_start();
}


if (isset($_SESSION['user_name']) && $_SESSION['user_id']) {

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
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "./images/" . $filename;
        $product_image_ext = $filename;


        // upload image on the folder
        if (!move_uploaded_file($tempname, $folder)) {
            echo "<h3>  Failed to upload image!</h3>";
        }


        // Check if this user has another product with the same product name
        $sql_select_productName = "SELECT * FROM product WHERE user_id = $user_id AND product_name ='" . $product_name . "'";
        $stmt = $conn->prepare($sql_select_productName);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {


            // if the username exist , send error message
            $return_msg = $return_msg .  "<p class='py-3'> <span style='color:red ;'> Sorry this product name exist in your account, plz try again.  </span> </p>";
            // print_r($_SESSION);


        } else {

            // If this user does not that product then we insert this product in the database 
            $sql2 = "INSERT INTO product (product_name, product_price, upload_date, product_image, age, user_id, category_id, brand_id, condition_id, paymentype_id, product_description) VALUES (?, ?, ?, ?, ? ,?,?, ?,?, ? , ?)";

            $stmt = $conn->prepare($sql2);
            $stmt->bind_param('sdssiiiiiis', $product_name, $product_price, $upload_date, $product_image_ext, $product_age, $user_id, $product_category, $select_brand, $product_condition, $PaymentMethod, $product_desc);

            if ($stmt->execute()) {

                // send message 
                $return_msg = $return_msg . " <p class='py-3'> <span style='color:green ;'>  Your new Product added successfully </span> </p>";
            } else {
                // send message that there are error 
                $return_msg = $return_msg . "<p class='py-3'> <span style='color:red ;'> Error: " . $sql . "<br>" . $conn->error . "</span> </p>";
            }
        }
    }
} else {
    header("Location:../not-allawed-page.php"); /* Redirect browser */

    exit;
}
