<?php

// include 'conn.php';
$i = 0;

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


            $sql = "SELECT * FROM product WHERE user_id = $user_id"; // SQL with parameters
            $stmt = $conn->prepare($sql);

            $stmt->execute();


            if ($result = $stmt->get_result()) {

                echo '<table class="table p-5">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Price</th>
                                <th scope="col">Product Description</th>
                                <th scope="col">Update</th>
                            </tr>
                            </thead>
                            <tbody>';


                // fetch data   
                while ($row = $result->fetch_assoc()) {

                    $i++;
                    echo '<tr><th scope="row">' . $i . '</th>
                                    <td>' . $row["product_name"] . '</td>
                                    <td>' . $row["product_price"] . '</td>
                                    <td>' . $row["product_description"] . '</td>
                                    <td><a type="button" class="btn btn-green my-3 p-2" href="./update_product_selectOneProduct.php?product_id=' . $row["product_id"] . '"> Update Product </a></td>
                                    </tr>';
                }


                echo '</tbody></table>';
            }
        }
    }
} else {
    header("Location:../not-allawed-page.php"); /* Redirect browser */

    exit;
}
