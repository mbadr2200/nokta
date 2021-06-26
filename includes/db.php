<?php

  // define database connection constants
 
 define("DBHOST","181.215.242.81:35840");
 define("DBUSER","admin");
 define("DBPASS","1wPw4Ami");
 define("DB","nabdaxyz_tbya");
 

// connect to database

 $conn = new mysqli(DBHOST, DBUSER,DBPASS,DB) or die("Connect failed: %s\n". $conn -> error);

// check if connection failed 

 if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?>