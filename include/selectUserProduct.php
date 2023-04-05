<?php

include 'conn.php';

if (session_status() !== PHP_SESSION_ACTIVE) {

    session_start();
}

if (isset($_SESSION['user_name'])) {



    $user_name = $_SESSION['user_name'];
    $user_id = $_SESSION['user_id'];


    $sql = "SELECT count(*) AS count FROM product WHERE user_id = $user_id"; // SQL with parameters
    $stmt = $conn->prepare($sql);

    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $product_total =  $row['count'];

        if ($product_total == 0) {
            echo '<p class="text-secondary"> No product added yet ....</p>';
        } else {


            $sql_select_products = "SELECT * FROM product WHERE user_id = $user_id"; // SQL with parameters
            $stmt_select_products = $conn->prepare($sql_select_products);

            $stmt_select_products->execute();
            $result_select_products = $stmt_select_products->get_result();

            while ($row = $result_select_products->fetch_assoc()) {

                        echo '<div class="col-md-4 p-3"> <div class="card">
                        <img class="card-img-top p-3" src="./images/' . $row["product_image"] . '" alt="Card image cap">
                        <div class="card-body text-center">
                          <h5 class="card-title">' . $row["product_name"] . '</h5>
                          <h6 class="card-title text-success">' . $row["product_price"] . '</h6>

                          <a class="btn btn-green my-3 p-2" href="product_details.php?product_id='.$row["product_id"].'" role="button">Product Info</a>
                          
                        </div>
                      </div></div>';
                    }
        }
    }




} else {
    header("Location:../not-allawed-page.php"); /* Redirect browser */

    exit;
}
