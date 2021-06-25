<?php

$dbhost = "181.215.242.81:35840";
 $dbuser = "admin";
 $dbpass = "1wPw4Ami";
 $db = "nabdaxyz_tbya";

 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

 if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?>