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
    
                // Add an update 
                if ($_POST['task'] == 'update') {
                    $success = $user->insert_update( $_POST['variable'], $_POST['date'], $id, $_POST['goal_id']);
                    echo $_POST['goal_id'];
                }
        
       
        }
    
       

       }
// Show whatever this activity is
$update =  $user->selectUpdate( $id);


require('views/goals.php');
require('views/footer.php');

