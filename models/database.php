<?php

// Return a PDO connection
function databaseConnection() {
	  // Connection parameters
   
    
    // Connection parameters
  //  require_once('../mysql.php');
    
    // Attempt connection
    try {


        //$db = mysql_connect("107.180.26.70", "souki", "souki", "dailyhabit" );

       // $con = mysql_connect("localhost", "souki", "souki");

      //  mysql_select_db("dailyhabit", $con);

        
        $db = new PDO("mysql:host="localhost";dbname="dailyhabit";charset=utf8", "souki", "souki");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // For development only
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


    
        return $db;
    }
    
    // If it doesn't work
    catch (PDOException $e) {
        echo $e->getMessage(); // For development only
        return NULL;
    }
}

?>