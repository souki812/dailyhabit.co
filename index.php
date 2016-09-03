<?php // Controller for the home page
//index.php
session_start();

// Show the home page only if logged in
if(isset($_SESSION['user_id'])){

  require('views/home.php');
  require('views/footer.php');
   
} else{
    require('views/signup.php');
}
