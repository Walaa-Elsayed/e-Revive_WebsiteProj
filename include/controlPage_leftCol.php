<div class="row py-5">
    <div class="col"><?php echo '<img src="./images/' . $user_image . '" class="rounded float-left profile-img" alt="user-profile-img">';?> </div>
    <div class="col d-flex  align-items-center">
        <div class="content"> 
            <h2 class="profile_user_name"> <?php echo $user_name; ?>  </h2>
            <h6><?php include 'include/selectProductTotal.php'; ?> </h6>
            <h6> <?php echo $user_address; ?>  </h6>
        </div>
    </div>




    <div class="row pt-5">
        <div class="">
            <p><q class="about-user-info"> <?php echo $user_info; ?></q></p>
        </div>
    </div>

    <div class="row py-3">
        <div class="">
            <a href="../userControlPage.php" type="button" class="btn control-menu-btn m-2">Main Content</a><br>
            <a href="../update_userProfile.php" type="button" class="btn control-menu-btn m-2">Update User Profile</a><br>
            <a href="../add_new_product.php" type="button" class="btn control-menu-btn m-2">Add New Product</a><br>
            <a href="../update_product.php" type="button" class="btn control-menu-btn m-2">Update Product</a><br>
            <a href="../delete_product.php" type="button" class="btn control-menu-btn m-2">Delete Product</a>
        </div>
    </div>
</div>

<div class="row"></div>