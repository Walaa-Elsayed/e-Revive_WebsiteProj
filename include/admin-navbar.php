<?php


if(session_status() !== PHP_SESSION_ACTIVE){


session_start();
get_navbar();

}else{

  get_navbar();

}


function get_navbar(){

  
  if (isset($_SESSION['user_name'] )) {

    echo '   <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid px-5">
  
      <a class="navbar-brand" href="./index.php"><span class="logo_style"> e-Revive </span></a>
  
      
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav m-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./SearchPage.php">Search</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="./contact.php"> Contact</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="./info.php">Information</a>
          </li>
         
          
        </ul>
      </div>
  
      <div class="col-md-3 text-end">
          <a type="button" class="btn btn-outline-primary m-1" href="./userControlPage.php"> User Profile</a>
          <a type="button" class="btn btn-outline-primary m-1" href="./include/sign_out.php"> Log Out</a>
        </div>
    
  
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
  
  </div>
  </nav>';


  }else{
    
    echo '   <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid px-5">
  
      <a class="navbar-brand" href="./index.php"><span class="logo_style"> e-Revive </span></a>
  
      
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav m-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./SearchPage.php">Search</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="./contact.php"> Contact</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="./info.php">Information</a>
          </li>
         
          
        </ul>
      </div>
  
      <div class="col-md-3 text-end">
          <a type="button" class="btn btn-outline-success m-1" href="./login.php">Log In</a>
          <a type="button" class="btn btn-success m-1" href="./register.php">Sign Up</a>
        </div>
    
  
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
  
  </div>
  </nav>';
  }

}

    




?>