<?php 
session_start();


require_once('models/database.php');
$db = databaseConnection();



// Must be logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ./');
    exit();
}

$id = $_SESSION['user_id'];


 if (!isset($db)) {
        $_SESSION['message'] = "Could not connect to the database.";
    }else{
     
      require_once('models/user.php');
      $user = new User($db);
        
        if (isset($_POST['task'])) {
    
                // Add a goal 
                if ($_POST['task'] == 'current') {
                    $success = $user->current(  $_POST['current_habit'], $_POST['current_days'], $id);
                }
        
       
        }
    
        // Remove a goal
        if (isset($_POST['current_id'])) {
            $success= $user->remove_current( $_POST['current_id']);
        }

       }
// Show whatever this activity is
$current =  $user->selectCurrent( $id);
require('views/goals.php');
require('views/footer.php');

