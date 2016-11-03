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
$habit_id = $user->gethabitid($id);


 if (!isset($db)) {
       exit();
 }else{
 		
 		
      //Getting all the dates clicked from the database in array format
		$dates = $user->getdate($id);

		//PHP's associative array becomes an object literal 
		echo json_encode($dates, JSON_PRETTY_PRINT);
 }


