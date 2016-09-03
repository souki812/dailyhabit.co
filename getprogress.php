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


 if (!isset($db)) {
       exit();
 }else{
      $val = $val + 5;
      $success = $user->progress( $val, $id);
      echo $success;
 }

$progress = $user->selectAll( $id);
