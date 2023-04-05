<?php include 'include/check-error.php'; ?>
<?php include 'include/get_session_details.php'; ?>

<?php

$user_name = $_SESSION['user_name'];

if ($user_name) {

    echo '<!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Control Page</title>
    
        <!-- Bootstrap style sheets -->
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <!-- JavaScript B undle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
    
        <!-- style sheets -->
        <link rel="stylesheet" href="css/styles.css">
    </head>
    
    <body id="body_control_page">';

    include 'include/admin-navbar.php'; 


    echo ' <main class="container-fluid" id="main_control_page">
    <div class="row">
        <div class="col-md-4 p-5 bg-light">

            <h3 class="py-3">Control Page</h3>

            <div class="d-grid col-12">

                <a href="edit-product.php" class="btn primary-color btn-lg active m-2" role="button" aria-pressed="true">Edit Product</a><br>
                <a href="edit-category.php" class="btn btn-lg active m-2" role="button" aria-pressed="true">Edit Category</a><br>
                <a href="#" class="btn btn-lg active m-2" role="button" aria-pressed="true">Edit product Type</a><br>

            </div>

        </div>

        <div class="col-md-8" id="main_control_second_section">
          
        

        </div>

    </div>

</main>';


echo "<!-- Footer starts here -->
<?php include 'include/footer.php'; ?>

</body>

</html>";


} else {

    header("Location:not-allawed-page.php"); /* Redirect browser */

        exit;
}


?>







