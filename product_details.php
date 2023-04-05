<?php include 'include/check-error.php'; ?>
<?php include 'include/conn.php'; ?>

<?php include 'include/select_product_page.php'; ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <title>Home Page</title>
    <?php include 'include/head_links.php'; ?>

</head>

<body>

    <!-- admin navbar -->
    <?php include 'include/admin-navbar.php'; ?>



    <!-- Main starts here -->
    <main class="container py-5" id="homepage">
        <div class="row w-100">

            <div class="col-md-6 text-center p-2"> <?php echo $product_img; ?></div>
            <div class="col-md-6 text-left p-2">
                <h3> <?php echo $product_name; ?> </h3>
                <h4> <?php echo $product_price; ?> </h4>
                <div><button type="button" class="btn btn-green my-2 px-5 py-2">Buy Now</button> </div>
                <div><button type="button" class="btn btn-green my-2 px-5 py-2">Make an Offer</button> </div>
            </div>


        </div>

        <div class="row">

            <div class="product_desc p-4">
                <h4> Product Details </h4>

                <table class="table w-50 m-4">

                    <tbody>
                        <tr>
                            <th scope="row">Description</th>
                            <td><?php echo $product_description; ?></td>
                            
                        </tr>
                        <tr>
                            <th scope="row">Brand </th>
                            <td><?php echo $product_brand; ?></td>
                            
                        </tr>
                        <tr>
                            <th scope="row">Category</th>
                            <td><?php echo $product_category; ?></td>
                            
                        </tr>

                        <tr>
                            <th scope="row">Payment Method</th>
                            <td><?php echo $product_paymentype; ?></td>
                            
                        </tr>

                    </tbody>
                </table>
                

            </div>



        </div>

    </main>





    <!-- Footer starts here -->
    <?php include 'include/footer.php'; ?>

</body>

</html>