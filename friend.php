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
 } else {
        
        // Create user model
        require_once('models/user.php');
        $user = new User($db);
        
         // Get the profile data
         if (isset($_GET['user_id'])) {
          
            $friend_id = (int) $_GET['user_id'];
            $_SESSION['friend'] = $friend_id;
            $success= $user->selectAll( $friend_id);
            $names= $user->selectAll( $friend_id);
            $selection = $user->selectAll( $friend_id);
            $comments = $user->selectComments($friend_id);
        }
        

 
         if (isset($_POST['task'])) {
         
            $friend_comments = $user->comment_friend($_POST['friendcomment'],  $_POST['task'], $id);
            $success= $user->selectAll( $_POST['task']);
            $selection = $user->selectAll( $_POST['task']);
            $comments = $user->selectComments($_POST['task']);
        }
 }
        


// Show whatever this activity is

require('views/friend.php');
require('views/footer.php');