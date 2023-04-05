<?php include 'include/check-error.php'; ?>



<!DOCTYPE html>
<html lang="en">

<head>
    
    <title>e-Revive - Register Page</title>
    <?php include 'include/head_links.php'; ?>

</head>


<body id="register_body">
    <!-- header starts here -->


    <div class="layout"></div>

    <!-- Main starts here -->
    <main class="container d-flex justify-content-center align-item-center">
        <div class="row py-5 w-50">
            <div class="col">

                <div class="card mt-5 p-5">

                    <h2>Register Page</h2>
                    <div class="form_container container">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                            <div class="mb-3">
                                <label for="user_name" class="form-label">Username</label>
                                <input type="text" class="form-control" id="user_name" name="user_name"  required>

                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="user_email" name="user_email"  required>
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>


                            <div class="mb-3">
                                <label for="user_password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="user_password" name="user_password"  required>
                            </div>

                            
                            <button type="submit" class="btn btn-primary m-1"> Submit</button>
                            <a href="login.php" class="btn btn-primary m-1 "> Log in</a>

                        </form>


                        <?php include 'include/insert_user_db.php'; ?>
                        <?php echo $return_msg; ?>

                    </div>
                </div>


            </div>



        </div>
    </main>



</body>

</html>