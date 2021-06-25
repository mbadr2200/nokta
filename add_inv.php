<?php 

 include "db.php";
 
if(isset($_POST["submit"]))
{
       
  $inv_name = $_POST["inv_name"];
       
       
  $query = "INSERT INTO inventroies (name) VALUES ('$inv_name')";
     
  if ($conn->query($query) === TRUE) {
    //echo "New record created successfully";
  } else {
   //echo "Error: " . $query . "<br>" . $conn->error;
  }     
}
     


?>

<html>
 <head>
 <link rel="stylesheet" href="./style.css">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Test</title>
 </head>
 <body>
 
   <a href="/index.php" class ="btn"> الرئيسية </a>
   <h1>إضافة مخزن </h1>
   <form action ="add_inv.php" method ="POST">
   
     <label>إسم المخزن</label>
     <input type="text" name="inv_name" required\>
     <input type="submit" value="إضافة" name="submit"\>
     
   </form>
   <div class="result">
   
   
   <?php 
         
            
     // Retrive data from mysql    
     
     $query = "SELECT * FROM inventroies";
     
     $result = $conn->query($query);

     if ($result->num_rows > 0) 
     {
       ?>
       <ul class="list_container">
       <?php
      // output data of each row
       while($row = $result->fetch_assoc()) 
       {
       ?>
       <?php
       if(!empty($row["name"])){
       ?>
       <li class="list">
       <?php 
         echo $row["name"];
         
       ?>
       </li>
       <?php
       }}
       ?> 
       
       </ul>
       
       <?php
      }
      else 
      {
       echo "لا توجد مخازن مضافة";     
      }
  ?>
   
   
    </div>

 </body>
</html>