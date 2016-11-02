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
$habit_id = $user->getcurrenthabit($id);


$moment = $_POST['moment'];


 if (!isset($db)) {
       exit();
 }else{
 		
      $success = $user->insert_date($moment, $id, $habit_id);
      echo $success;   
 }


