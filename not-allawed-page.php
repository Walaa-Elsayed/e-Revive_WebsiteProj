<?php include 'include/check-error.php'; ?>
<?php include 'include/check_username_pwd.php';?>
<?php include 'include/conn.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
   
    <title>e-Revive - Login Page</title>
    <?php include 'include/head_links.php'; ?>

</head>

<body class="index_body">
    <!-- header starts here -->
   

    <div class="layout"></div>

    <!-- Main starts here -->
    <main class="fluid-container d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col">
                
               <div class="card mt-5 p-5">
               
               <!-- <h3 class="text-danger"> YOU ARE NOT ALLAWED TO ACCESS THIS PAGE SIGN IN FIRST</h3> -->
               <h4>Login Form</h4>
               <div class="form_container">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" >
                        <div class="mb-3">
                            <label for="user_name" class="form-label">Username</label>
                            <input type="text" class="form-control" id="user_name" name="user_name" aria-describedby="text" value="<?php echo $username; ?>" require>
                            
                        </div>
                        <div class="mb-3">
                            <label for="user_password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="user_password" name="user_password" value="<?php echo $user_password; ?>" require>
                        </div>

                        
                        <button type="submit" class="btn btn-primary" id="log_in" name="log_in">Log In</button>
                        <a href="register.php" class="btn btn-primary" role="button">Register Now</a>

                    </form>

                    
                </div>
                <?php echo $return_msg; ?> 
                <a class="py-3" href="index.php"> Log In As A Guest - Home Page</a>

               </div>  

                

            </div>

           
            
        </div>
    </main>

    
</body>

</html>