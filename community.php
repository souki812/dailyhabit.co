<?php // Controller for some internal activity
//activity.php
session_start();


require_once('models/database.php');
$db = databaseConnection();



// Must be logged in
if (!isset($_SESSION['user_id'])) {
    exit();
}


$id = $_SESSION['user_id'];




 if (!isset($db)) {
    $_SESSION['message'] = "Could not connect to the database.";
 }else{
     
    require_once('models/user.php');
    $user = new User($db);
    $admin = $user->getadmin($id);
    
    if ($admin == 0 ){
        $selection = $user->communityselect();
        $fullName =  $user->selectAll( $id);
    }
    
    if($admin == 1 ){
        $_SESSION['administrator'] = 1;
        $selection = $user->communityselect();
        $fullName =  $user->selectAll( $id);
    
        if (isset($_POST['user_id'])) {
            $success= $user->deleteAccount($_POST['user_id']);
        }                             
    }
 }
 



// Show whatever this activity is

require('views/community.php');
require('views/footer.php');