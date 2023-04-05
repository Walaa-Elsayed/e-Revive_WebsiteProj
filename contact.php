<?php include 'include/check-error.php'; ?>
<?php include 'include/conn.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Contact Page</title>
    <?php include 'include/head_links.php'; ?>

</head>

<body>

    <!-- admin navbar -->
    <?php include 'include/admin-navbar.php'; ?>

    <main class="container-fluid">
        <div class="row p-5 bg-light">
            <div class="container px-5">
                <h2 class="pb-3"> Contact Us </h2>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                    <div class="form-group row py-2">
                        <label for="user_name" class="col-sm-2 col-form-label">User name</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Please enter your name..." required>
                        </div>
                    </div>

                    <div class="form-group row py-2">
                        <label for="user_email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-7">
                            <input type="email" class="form-control" name="user_email" id="user_email" placeholder="Please enter your email..." required>
                        </div>
                    </div>

                    <div class="form-group row py-2">
                        <label for="user_subject" class="col-sm-2 col-form-label">Subject</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="user_subject" id="user_subject" placeholder="Please enter your subject..." required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="user_message" class="col-sm-2"> Message </label>
                        <div class="col-sm-7">
                            <textarea class="form-control" id="user_message" name="user_message" rows="4"></textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-green my-3 p-2"> Send Message </button>


                </form>

            </div>

        </div>



        <?php include 'include/contact_send_msg.php'; ?>




    </main>

    <!-- Footer starts here -->
    <?php include 'include/footer.php'; ?>


</body>

</html>