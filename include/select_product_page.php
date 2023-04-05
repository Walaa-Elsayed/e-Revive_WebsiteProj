<?php



include 'conn.php';

    $product_id = $_GET['product_id'];
    $product_name = "";
    $product_price = 0.0;
    $product_description ="";
    $product_brand = "";
    

    $sql = "SELECT * FROM product WHERE product_id = $product_id"; // SQL with parameters
    $stmt = $conn->prepare($sql);

    $stmt->execute();


    if ($result = $stmt->get_result()) {

        // fetch data   
        while ($row = $result->fetch_assoc()) {


            $product_name = $row["product_name"];
            $product_price = $row["product_price"];
            $product_description = $row["product_description"];
            $product_img = ' <img src="images/'.$row["product_image"].'" alt="product img" class="img-thumbnail product_page_img">';
            $product_age = $row['age'];

            // select product brand

            $product_brand_id = $row["brand_id"];

            $sql_select_brand = "SELECT * FROM brandtype WHERE brand_id = ".$product_brand_id; // SQL with parameters
            $stmt_select_brand = $conn->prepare($sql_select_brand);

            $stmt_select_brand->execute();
            $result_select_brand = $stmt_select_brand->get_result(); // get the mysqli result


            // fetch data   
            while ($row_select_brand = $result_select_brand->fetch_assoc()) {

                         if($product_brand_id == $row_select_brand["brand_id"]){

                            $product_brand = $row_select_brand["brand_name"];

                         }
            }


            
            // select product category

            $product_category_id = $row["category_id"];

            $sql_select_category = "SELECT * FROM category WHERE category_id = ".$product_category_id; // SQL with parameters
            $stmt_select_category = $conn->prepare($sql_select_category );

            $stmt_select_category->execute();
            $result_select_category = $stmt_select_category->get_result(); // get the mysqli result


            // fetch data   
            while ($row_select_category = $result_select_category->fetch_assoc()) {

                         if($product_category_id == $row_select_category["category_id"]){

                            $product_category = $row_select_category["category_name"];

                         }
            }


             // select product payment method

             $product_paymentype_id = $row["paymentype_id"];

             $sql_select_paymentype = "SELECT * FROM paymentype WHERE payment_id = ".$product_paymentype_id; // SQL with parameters
             $stmt_select_paymentype = $conn->prepare($sql_select_paymentype );
 
             $stmt_select_paymentype->execute();
             $result_select_paymentype = $stmt_select_paymentype->get_result(); // get the mysqli result
 
 
             // fetch data   
             while ($row_select_paymentype = $result_select_paymentype->fetch_assoc()) {
 
                          if($product_paymentype_id == $row_select_paymentype["payment_id"]){
 
                             $product_paymentype = $row_select_paymentype["payment_name"];
 
                          }
             }

           
            
        }}


    

?>