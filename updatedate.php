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



 if (!isset($db)) {
       exit();
 }else{
 		 // Remove a goal
        if (isset($_POST['update_id'])) {
            $success= $user->remove_update( $_POST['update_id']);
        }

 		
      //Getting all the dates clicked from the database in array format
		$updatedates = $user->getupdatedate($id);

		//PHP's associative array becomes an object literal 
		echo json_encode($updatedates, JSON_PRETTY_PRINT);
 }


