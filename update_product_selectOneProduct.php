<?php include 'include/check-error.php'; ?>
<?php include 'include/conn.php'; ?>
<?php include 'include/selectUserInfo.php'; ?>





<!DOCTYPE html>
<html lang="en">

<head>

    <title>Update Product</title>
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
            <?php include 'include/select_oneProduct_update.php'; ?>
          
                
            </div>

        </div>

    </main>


    <!-- Footer section -->
    <?php include 'include/footer.php'; ?>



</body>

</html>