
<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // first get the product data values 
    $product_name = $_POST['product_name'];
    $product_category = intval($_POST['product_category']);
    $select_brand = intval($_POST['select_brand']);
    $product_condition = intval($_POST['product_condition']);

    $sql_get_total = "SELECT * FROM product WHERE product_name LIKE '%$product_name%' and category_id= $product_category and brand_id=$select_brand and condition_id=$product_condition ORDER BY upload_date DESC LIMIT 8"; // SQL with parameters
    $stmt = $conn->prepare($sql_get_total);

    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        echo '<div class="col-md-3 py-2">
            <div class="card text-center">
            <img class="card-img-top" src="images/' . $row['product_image'] . '" alt="product image">
            <div class="card-body">
            <h6 class="card-text">' . $row['product_name'] . '</h6>
            <h6 class="card-text">' . $row['product_price'] . '</h6>
            <p class="card-text">' . $row['product_description'] . '</p>

            <button type="submit" class="btn btn-green my-3 p-2" onclick="location.href=\'./product_details.php\'">More Info... </button>

            </div>
            </div>
            </div>';
    }

   

} else {



    $sql_get_total = "SELECT * FROM product ORDER BY upload_date DESC LIMIT 8"; // SQL with parameters
    $stmt = $conn->prepare($sql_get_total);

    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        echo '<div class="col-md-3 py-2">
            <div class="card text-center">
            <img class="card-img-top" src="images/' . $row['product_image'] . '" alt="product image">
            <div class="card-body">
            <h6 class="card-text">' . $row['product_name'] . '</h6>
            <h6 class="card-text">' . $row['product_price'] . '</h6>
            <p class="card-text">' . $row['product_description'] . '</p>

            <button type="submit" class="btn btn-green my-3 p-2 onclick="location.href=\'./product_details.php\'">More Info... </button>

            </div>
            </div>
            </div>';
    }
}







?>