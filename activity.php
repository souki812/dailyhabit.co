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
        
        
         if (isset($_POST['task'])) {
            //Add a biography
            if ($_POST['task'] == 'biography') {
                $success = $user->bio($id,  $_POST['biography']);
            }
        
            //Add a comment
            if ($_POST['task'] == 'newsfeed') {
                $success = $user->newsfeed( $_POST['newsfeed'], $id);
            }
        }
        
        if (isset($_POST['comment_id'])) {
            //Remove comment
            $success= $user->remove_comment( $_POST['comment_id']);
        }
        
        if(isset($_POST['profile']))
            $allow = array("jpg", "jpeg", "gif", "png");
            $todir = 'views/uploads/';
            
            
    if ( $_FILES['file']['tmp_name'] ){
    
    $info = explode('.', strtolower( $_FILES['file']['name']) ); // whats the extension of the file

    if ( in_array( end($info), $allow) ) {
        if ( move_uploaded_file( $_FILES['file']['tmp_name'], $todir . basename($_FILES['file']['name']))){
            //Save picture name in database
            $success = $user->picture( $_FILES["file"]["name"], $id);
            echo "File: " . $_FILES["file"]["error"] . "<br>";
        }
    }else{
        // error this file ext is not allowed
         echo "Error: " . $_FILES["file"]["error"] . "<br>";
    }
  }
  
  
$selection = $user->selectAll( $id);
$comments =  $user->selectNewsfeed($id);
$uploadimage = $user->selectAll($id);
}




// Show whatever this activity is

require('views/activity.php');
require('views/footer.php');