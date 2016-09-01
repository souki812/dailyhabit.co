<?php // Controller for registration/login
//authenticate.php
session_start();

// Should have form inputs
if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['task'])) {
   
    // Connect to database
    require_once('models/database.php');
    $db = databaseConnection();
    
    if (!isset($db)) {
        $_SESSION['message'] = "Could not connect to the database.";
    } else {
        
        // Create user model
        require_once('models/user.php');
        $user = new User($db);
        
        // Attempt registration
        if ($_POST['task'] == 'register') {
            $admin = 0;
            $success = $user->register( $_POST['first'], $_POST['last'], $_POST['email'], $_POST['password'],  $_POST['gender'], $_POST['age'],$admin);
              
            
            if ($success) {
                $_SESSION['message'] = 'Registered! You can now log in.';
            } else {
                $_SESSION['message'] = 'Sorry, there is an account with the same email.';
            }
        }
          elseif ($_POST['task'] == 'login') {
              $user_id = $user->login($_POST['email'], $_POST['password']);
            
              if (isset($user_id)) {
                  session_regenerate_id(true); // New session for login
                  $_SESSION['user_id'] = $user_id;
                  $_SESSION['admin'] = $user->getadmin($user_id);
              } else {
                  $_SESSION['message'] = 'Wrong username or password.';
              }
         
       
        }
    }
}

// Return home
header('Location: ./home.php');
exit();

