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
}

if (isset($_POST['task'])) {
    
    //Add a comment 
    if ($_POST['task'] == 'newsfeed') {
        $success = $user->newsfeed( $_POST['newsfeed'], $id);    
    }        
}
      
if (isset($_POST['comment_id'])) {
    //Remove comment
    $success= $user->remove_comment( $_POST['comment_id']);
}

    
$selection =  $user->selectAll( $id);
$comments =  $user->selectNewsfeed($id);


// Show whatever this activity is

require('views/home.php');
require('views/footer.php');