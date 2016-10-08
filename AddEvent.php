<?php

session_start();
require_once('models/database.php');
$db = databaseConnection();



// Must be logged in
if (!isset($_SESSION['user_id'])) {
    exit();
}

require_once('models/user.php');
$user = new User($db);
      
$id = $_SESSION['user_id'];      
//$value = $user->getdate( $id);


$title = $_POST['title'];
$date = $_POST['date'];

 if (!isset($db)) {
       exit();
 }else{
 		
      $success = $user->insert_event($title, $date, $id)
      echo $success;   
 }


