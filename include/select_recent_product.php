
            <?php


            $sql_get_total = "SELECT * FROM product ORDER BY upload_date DESC LIMIT 4"; // SQL with parameters
            $stmt = $conn->prepare($sql_get_total);

            $stmt->execute();
            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-md-3 pt-2">
                            <div class="card text-center p-4 m-2">
                                <img class="card-img-top" src="images/' . $row['product_image'] . '" alt="product image">
                                <div class="card-body">
                                        <h6 class="card-text">' . $row['product_name'] . '</h6>
                                        <h6 class="card-text primary-color">' . $row['product_price'] . '</h6>
                                        <a class="btn btn-green my-3 p-2" href="product_details.php?product_id='.$row["product_id"].'" role="button">Product Info</a>

                                </div>
                            </div>
                        </div>';
            }

            ?>

