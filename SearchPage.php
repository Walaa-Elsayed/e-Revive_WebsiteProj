<?php include 'include/check-error.php'; ?>
<?php include 'include/conn.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Search Page</title>
    <?php include 'include/head_links.php'; ?>

</head>

<body>

    <!-- admin navbar -->
    <?php include 'include/admin-navbar.php'; ?>

    <main class="container-fluid">
        <div class="row p-5 bg-light">
            <div class="container text-center">
                <h2 class="pb-3"> Search Options</h2>
               
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                    <div class="form-group row py-2">
                        <label for="product_name" class="col-sm-3 col-form-label">Product Name</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Enter product name..." required>
                        </div>
                    </div>

                    <div class="form-group row py-2">
                        <label for="product_category" class="col-sm-3 col-form-label">Product category</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="product_category">
                                <?php include 'include/select_category.php'; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row py-2">
                        <label for="product_brand" class="col-sm-3 col-form-label">Product Brand</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="select_brand">
                                <?php include 'include/select_brand.php'; ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group row py-2 ">
                        <label for="product_condition" class="col-sm-3 col-form-label">Product Condition</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="product_condition">
                                <?php include 'include/select_condition.php'; ?>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-green my-3 p-2"> Submit Search</button>


                </form>

            </div>

        </div>

        <div class="row p-5 mx-5">

            <h2> Search Result </h2>
            <?php include 'include/select_research_product.php'; ?>


        </div>


    </main>

    <!-- Footer starts here -->
    <?php include 'include/footer.php'; ?>


</body>

</html>