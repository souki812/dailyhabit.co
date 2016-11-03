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
$val = $_POST['val'] ;
$days = $user->getcurrentdays($id);



$habit_id = $user->gethabitid($id);
//$days = $user->countdate($id, $habit_id);




 if (!isset($db)) {
       exit();
 }else{
      $val = ceil(100/$days);
      echo $val;
 }

$progress = $user->selectAll( $id);
