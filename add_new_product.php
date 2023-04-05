<?php include 'include/check-error.php'; ?>
<?php include 'include/conn.php'; ?>
<?php include 'include/selectUserInfo.php'; ?>




<!DOCTYPE html>
<html lang="en">

<head>

    <title>Add-New-Product</title>
    <!-- Website Links  -->
    <?php include 'include/head_links.php'; ?>

</head>

<body>

    <!-- admin navbar -->
    <?php include 'include/admin-navbar.php'; ?>


    <main class="container-fluid">
        <div class="row w-100 h-100">
            <div class="col-md-4 left-section text-white text-center">

                <?php include 'include/controlPage_leftCol.php'; ?>

            </div>

            <div class="col-md-8 p-5">


                <!-- insert product in database -->
                <?php include 'include/insert_product.php'; ?>
                <!-- return message -->
                <?php echo $return_msg; ?>

                <h4> Add New Product</h4>

                <form class="py-4" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                    <div class="form-group row py-2">
                        <label for="product_name" class="col-sm-2 col-form-label">Product Name</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Enter product name..." required>
                        </div>
                    </div>
                    <div class="form-group row py-2">
                        <label for="product_price" class="col-sm-2 col-form-label">Product Price</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" id="product_price" name="product_price" placeholder="Enter product price..." required>
                        </div>
                    </div>

                    <div class="form-group row py-2 ">
                        <label for="product_image" class="col-sm-2 col-form-label">Product Image</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="file" name="uploadfile" value="" placeholder="Enter product name..." required>
                        </div>
                    </div>

                    <div class="form-group row py-2">
                        <label for="product_category" class="col-sm-2 col-form-label">Product category</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="product_category">
                                <?php include 'include/select_category.php'; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row py-2">
                        <label for="product_brand" class="col-sm-2 col-form-label">Product Brand</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="select_brand">
                                <?php include 'include/select_brand.php'; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row py-2">
                        <label for="product_age" class="col-sm-2 col-form-label">Product Age</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="product_age">
                                <?php include 'include/select_age.php'; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row py-2 ">
                        <label for="product_condition" class="col-sm-2 col-form-label">Product Condition</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="product_condition">
                                <?php include 'include/select_condition.php'; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row py-2">
                        <label for="PaymentMethod" class="col-sm-2 col-form-label">Payment Method</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="PaymentMethod">
                                <?php include 'include/select_paymentMethod.php'; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row py-2">
                        <label for="product_desc" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-7">
                            <textarea class="form-control" id="product_desc" rows="3" name="product_desc"></textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-green my-3 p-2"> Add new Product</button>

                </form>





            </div>

        </div>

    </main>


    <!-- Footer section -->
    <?php include 'include/footer.php'; ?>



</body>

</html>