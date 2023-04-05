<?php



include 'conn.php';

if (session_status() !== PHP_SESSION_ACTIVE) {

    session_start();
}

if (isset($_SESSION['user_name'])) {


    $user_name = $_SESSION['user_name'];
    $user_id = $_SESSION['user_id'];
    $product_id = $_GET['product_id'];

    $sql = "SELECT * FROM product WHERE product_id = $product_id"; // SQL with parameters
    $stmt = $conn->prepare($sql);

    $stmt->execute();


    if ($result = $stmt->get_result()) {

        // fetch data   
        while ($row = $result->fetch_assoc()) {

            echo '<h4> Update Product</h4>

            <form class="py-4" method="POST" action="finish_update_product.php" enctype="multipart/form-data">
                <div class="form-group row py-2">
                <input type="hidden" id="product_id" name="product_id" value='.$product_id.'>
                    <label for="product_name" class="col-sm-2 col-form-label">Product Name</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="product_name" id="product_name" value ="' . $row['product_name'] . '" placeholder="Enter product name..." required>
                    </div>
                </div>
                <div class="form-group row py-2">
                    <label for="product_price" class="col-sm-2 col-form-label">Product Price</label>
                    <div class="col-sm-7">
                        <input type="number" class="form-control" id="product_price" name="product_price" value ="' . $row['product_price'] . '" placeholder="Enter product price..." required>
                    </div>
                </div>

                <div class="form-group row py-2 ">
                    <label for="product_image" class="col-sm-2 col-form-label">Product Image</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="file" name="uploadfile" placeholder="Enter product name...">
                    </div>
                </div>

                <div class="form-group row py-2">
                    <label for="product_category" class="col-sm-2 col-form-label">Product category</label>
                    <div class="col-sm-7">
                        <select class="form-control" name="product_category">
                            ';


            $sql_select_category = "SELECT * FROM category"; // SQL with parameters
            $stmt_select_category = $conn->prepare($sql_select_category);

            $stmt_select_category->execute();
            $result_select_category = $stmt_select_category->get_result(); // get the mysqli result


            // fetch data   
            while ($row_select_category = $result_select_category->fetch_assoc()) {

                if ($row_select_category["category_id"] == $row["category_id"]) {
                    echo '<option value="' . $row_select_category["category_id"] . '" selected> ' . $row_select_category["category_name"] . ' </option>';
                } else {
                    echo '<option value="' . $row_select_category["category_id"] . '"> ' . $row_select_category["category_name"] . ' </option>';
                }
            }

            echo '</select>
                    </div>
                </div>

                <div class="form-group row py-2">
                    <label for="product_brand" class="col-sm-2 col-form-label">Product Brand</label>
                    <div class="col-sm-7">
                        <select class="form-control" name="select_brand"> ';


            $sql_select_brand = "SELECT * FROM brandtype"; // SQL with parameters
            $stmt_select_brand = $conn->prepare($sql_select_brand);

            $stmt_select_brand->execute();
            $result_select_brand = $stmt_select_brand->get_result(); // get the mysqli result


            // fetch data   
            while ($row_select_brand = $result_select_brand->fetch_assoc()) {

                if ($row_select_brand["brand_id"] == $row["brand_id"]) {
                    echo '<option value="' . $row_select_brand["brand_id"] . '" selected> ' . $row_select_brand["brand_name"] . ' </option>';
                } else {
                    echo '<option value="' . $row_select_brand["brand_id"] . '"> ' . $row_select_brand["brand_name"] . ' </option>';
                }
            }

            echo ' </select>
                    </div>
                </div>

                <div class="form-group row py-2">
                    <label for="product_age" class="col-sm-2 col-form-label">Product Age</label>
                    <div class="col-sm-7">
                  
                    <select class="form-control" name="product_age">';

            $current_year = date("Y");
            if ($row['age'] == 0) {
                echo '<option value="0" selected> None </option>';
                for ($x = 2000; $x <= $current_year; $x++) {
                    echo '<option value="' . $x . '">' . $x . '</option>';
                }
            } else {

                echo '<option value="0" > None </option>';
                for ($x = 2000; $x <= $current_year; $x++) {
                    if ($x == $row['age']) {
                        echo '<option value="' . $x . '" selected >' . $x . '</option>';
                    } else {
                        echo '<option value="' . $x . '">' . $x . '</option>';
                    }
                }
            }

            echo '</select>
                    </div>
                </div>

                <div class="form-group row py-2 ">
                    <label for="product_condition" class="col-sm-2 col-form-label">Product Condition</label>
                    <div class="col-sm-7">
                        <select class="form-control" name="product_condition">';


            $sql_select_condition = "SELECT * FROM conditiontype"; // SQL with parameters
            $stmt_select_condition = $conn->prepare($sql_select_condition);

            $stmt_select_condition->execute();
            $result_select_condition = $stmt_select_condition->get_result(); // get the mysqli result


            // fetch data   
            while ($row_select_condition = $result_select_condition->fetch_assoc()) {

                if ($row_select_condition["condition_id"] == $row["condition_id"]) {
                    echo '<option value="' . $row_select_condition["condition_id"] . '" selected> ' . $row_select_condition["condition_name"] . ' </option>';
                } else {
                    echo '<option value="' . $row_select_condition["condition_id"] . '"> ' . $row_select_condition["condition_name"] . ' </option>';
                }
            }

            echo ' </select>
                    </div>
                </div>

                <div class="form-group row py-2">
                    <label for="PaymentMethod" class="col-sm-2 col-form-label">Payment Method</label>
                    <div class="col-sm-7">
                        <select class="form-control" name="PaymentMethod">';


            $sql_select_payment = "SELECT * FROM paymentype"; // SQL with parameters
            $stmt_select_payment = $conn->prepare($sql_select_payment);

            $stmt_select_payment->execute();
            $result_select_payment = $stmt_select_payment->get_result(); // get the mysqli result


            // fetch data   
            while ($row_select_payment = $result_select_payment->fetch_assoc()) {

                if ($row_select_payment["payment_id"] == $row["paymentype_id"]) {
                    echo '<option value="' . $row_select_payment["payment_id"] . '" selected> ' . $row_select_payment["payment_name"] . ' </option>';
                } else {
                    echo '<option value="' . $row_select_payment["payment_id"] . '"> ' . $row_select_payment["payment_name"] . ' </option>';
                }
            }

            echo '</select>
                    </div>
                </div>

                <div class="form-group row py-2">
                    <label for="product_desc" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-7">
                        <textarea class="form-control" id="product_desc" rows="3" name="product_desc">'. $row['product_description'].'</textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-green my-3 p-2" onclick="return confirm(\' Do you want to update this record? \')"> Update Product</button>

            </form>';
        }
    } else {
        echo '<p class="text-secondary"> No product added yet ....</p>';
    }
} else {
    header("Location:not-allawed-page.php"); /* Redirect browser */

    exit;
}
