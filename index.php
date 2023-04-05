<?php include 'include/check-error.php'; ?>
<?php include 'include/conn.php'; ?>




<!DOCTYPE html>
<html lang="en">

<head>

    <title>Home Page</title>
    <?php include 'include/head_links.php'; ?>

</head>

<body>

    <!-- admin navbar -->
    <?php include 'include/admin-navbar.php'; ?>

    <!-- header starts here -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container-fluid">
            <div class="row p-5">

                <div class="header-text-content p-5">
                    <h1 class="pl-5"> e-Revive</h1>
                    <p>Help your environment by selling and buying well-used <strong>Digital Product</strong></p>
                    <!-- Add New Product using this -->
                    <button type="submit" class="btn btn-green my-3 p-2" id="sell-btn" onclick="location.href='./add_new_product.php'"   >Sell Now</button>
                </div>

            </div>
        </div>
    </div>

    <!-- Main starts here -->
    <main class="container py-5" id="homepage">

        <div class="row d-flex justify-content-center align-items-center w-100 pb-5 ">

            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                <div class="form-group row p-2 d-flex justify-content-center align-items-center">
                    <!-- <label for="product_name" class="col-sm-2 col-form-label">Search for product</label> -->
                    <div class="col-sm-3 p-2 m-2">
                        <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Enter product name..." required>
                    </div>

                    <div class="col-sm-3 p-2 m-2">
                        <select class="form-control" id="category_id" name="category_id">
                            <option value=0 selected> All categories</option>
                            <?php include 'include/select_category.php'; ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-green  p-2 m-2  col-sm-2"> Search </button>
                </div>


            </form>


            <?php include 'include/get_select_result.php'; ?>

        </div>

        <!-- recent added product -->
        <div class="row">
            <div class="col">
                <h2>Recently Added</h2>
                <section class="container">
                    <div class="row pt-3">

                        <?php include 'include/select_recent_product.php'; ?>

                    </div>
                </section>
            </div>


        </div>

    </main>



    <!-- Footer starts here -->
    <?php include 'include/footer.php'; ?>

</body>

</html>