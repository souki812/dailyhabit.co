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


$moment = $_POST['moment'];


 if (!isset($db)) {
       exit();
 }else{
 		echo "id: " + $id;
 		echo $moment;
      $success = $user->insert_date($moment, $id);
      if ($success) {
      	echo "success";
      } else {
      	echo "FAILURE!";
      }
      echo $success;   
 }
