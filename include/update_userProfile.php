<?php


if (session_status() !== PHP_SESSION_ACTIVE) {

    session_start();
}

if (isset($_SESSION['user_name'])) {

    $user_name = $_SESSION['user_name'];
    $user_id = $_SESSION['user_id'];

    $sql = "SELECT * FROM user_profile WHERE user_id = $user_id"; // SQL with parameters
    $stmt = $conn->prepare($sql);

    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {

        echo '<form class="py-4" method="POST" action="update_userProfile_database.php" enctype="multipart/form-data">
        <div class="form-group row py-2">
            <input type="hidden" id="user_id" name="user_id" value=' . $row["user_id"] . '> 
            <label for="user_name" class="col-sm-2 col-form-label">User Name</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="user_name" id="user_name" value ="' . $row['user_name'] . '" placeholder="Enter your name..." required>
            </div>
        </div>

        <div class="form-group row py-2">
            <label for="user_email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-7">
                <input  type="email" class="form-control" id="user_email" name="user_email" placeholder="name@example.com" value="' . $row['user_email'] . '"  required>
            </div>
        </div>

        <div class="form-group row py-2 ">
            <label for="uploadfile" class="col-sm-2 col-form-label">Profile Image</label>
            <div class="col-sm-7">
                <input class="form-control" type="file" name="uploadfile" placeholder="Enter product name..." value ="' . $row['user_image'] . '">
            </div>
        </div>


        <div class="form-group row py-2">
            <label for="user_birthdate" class="col-sm-2 col-form-label">Birthdate</label>
            <div class="col-sm-7">
            <input type="date" class="form-control" name="user_birthdate" id="user_birthdate" value ="' . $row['user_birthdate'] . '">
            </div>
        </div>

        <div class="form-group row py-2">
            <label for="user_address" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="user_address" id="user_address" value ="' . $row['address'] . '">
            </div>
        </div>

        <div class="form-group row py-2">
                    <label for="user_info" class="col-sm-2 col-form-label"> More information</label>
                    <div class="col-sm-7">
                        <textarea class="form-control" id="user_info" rows="3" name="user_info">'. $row['more_info'].'</textarea>
                    </div>
        </div>


        <h4 class="py-3">Change Password</h4>

        <div class="form-group row py-2">
        
            <label for="new_password" class="col-sm-2 col-form-label">New password</label>
            <div class="col-sm-7">
                <input type="password" class="form-control" name="new_password" id="new_password">
            </div>

        </div>

        <div class="form-group row py-2">
        
            <label for="confirm_password" class="col-sm-2 col-form-label">Confirm password</label>
            <div class="col-sm-7">
                <input type="password" class="form-control" name="confirm_password" id="confirm_password">
            </div>

        </div>


        
        <button type="submit" class="btn btn-green my-5 p-2" onclick="return confirm(\' Do you want to update this data? \')" href =""> Update Profile</button>
        
        </form>';
    }
}
