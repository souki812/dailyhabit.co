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


      //Add a comment
            if ($_POST['task'] == 'wall') {
                $success = $user->wall( $_POST['wall'], $id);
            }
       
        
        if (isset($_POST['comment_id'])) {
            //Remove comment
            $success= $user->remove_post( $_POST['comment_id']);
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

         }

$comments =  $user->selectWall($id);
$uploadimage = $user->selectAll($id);

// Show whatever this activity is

require('views/wall.php');
require('views/footer.php');