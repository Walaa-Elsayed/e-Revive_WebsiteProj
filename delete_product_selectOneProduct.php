<?php

include 'include/conn.php';

// this is the return message when the product already exist in database
$return_msg = "";


if (session_status() !== PHP_SESSION_ACTIVE) {

    session_start();
}


if (isset($_SESSION['user_name']) && $_SESSION['user_id']) {

    // get product id 

    $product_id = $_GET['product_id'];

    // get user information
    $user_name = $_SESSION['user_name'];
    $user_id = $_SESSION['user_id'];


    $sql_delete = " DELETE FROM product WHERE product_id = ?";

    $stmt_delete = $conn->prepare($sql_delete);
    $stmt_delete->bind_param('i', $product_id);

    if ($stmt_delete->execute()) {

        // send message that the username and password added to database
        $return_msg = " <p class='py-3'> <span style='color:green ;'>  Your product successfully deleted ! </span> </p>";
    } else {
        // send message that there are error 
        $return_msg = "<p class='py-3'> <span style='color:red ;'> Error: " . $sql . "<br>" . $conn->error . "</span> </p>";
    }


} else {
    header("Location:../not-allawed-page.php"); /* Redirect browser */

    exit;
}


?>

<!-- Display any Errors -->
<?php include 'include/check-error.php'; ?>
<?php include 'include/conn.php'; ?>
<?php include 'include/selectUserInfo.php'; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Page title -->
    <title> Delete Product</title>
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

                    <?php include 'include/selectUserProduct_delete.php'; ?>


                </div>



            </div>

        </div>

    </main>
    <!-- Footer section -->
    <?php include 'include/footer.php'; ?>



</body>

</html>