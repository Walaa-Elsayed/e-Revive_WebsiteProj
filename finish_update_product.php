
<!-- Display any Errors -->
<?php include 'include/check-error.php'; ?>
<?php include 'include/conn.php'; ?>
<?php include 'include/selectUserInfo.php'; ?>
<?php include 'include/update_product_confirmData.php'; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Page title -->
    <title>e-Revive - Update Product</title>
    <!-- Website Links  -->
    <?php include 'include/head_links.php'; ?>
</head>

<body>

    <!-- admin navbar -->
    <?php include 'include/admin-navbar.php'; ?>


    <!-- main content section -->
    <main class="container-fluid">
        <div class="row w-100 control-main-section">
            <div class="col-md-4 left-section text-white text-center">
                <?php include 'include/controlPage_leftCol.php'; ?>

            </div>

            <div class="col p-5 w-100 container-fluid">
                <div class="row w-100">

                    <?php echo $return_msg; ?>

                    <h2> Product Available</h2>

                    <?php include 'include/selectUserProduct_update.php'; ?>


                </div>



            </div>

        </div>

    </main>
    <!-- Footer section -->
    <?php include 'include/footer.php'; ?>



</body>

</html>