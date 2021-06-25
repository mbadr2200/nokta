<?php

  include "db.php";
     
     if(isset($_POST['submit']))
     {
       $cat_name = $_POST["cat_name"];
       
       $query = "INSERT INTO categories (name) VALUES ('$cat_name')";
       
       if ($conn->query($query) === TRUE) {
         
        //echo "New record created successfully";
        
       } else {
         
        //echo "Error: " . $query . "<br>" . $conn->error;
        
       }
        
     }

?>

<html>
 <head>
 <link rel="stylesheet" href="/style.css">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Test</title>
 </head>
 <body>
 
   <a href="/index.php" class="btn"> الرئيسية </a>
   <h1>إضافة تصنيف </h1>
   <form action ="add_cat.php" method ="POST">
   
     <label>إسم تصنيف</label>
     <input type="text" name="cat_name" required\>
     <input type="submit" value="إضافة" name="submit"\>
     
   </form>
   <div class="result">
   <h4>التصنيفات</h4>
   
   <?php 

     // Retrive data from mysql    
     $query_categories = "SELECT * FROM categories";
     
     
     $categories = $conn->query($query_categories);
     
     
     if($categories->num_rows > 0 )
     {
       ?>
       <ul class ="list_container">
       <?php
       while($catgory = $categories->fetch_assoc())
       {
         $catgory_id = $catgory['id'];
         
         $query_items = "SELECT * FROM items WHERE cat_id = $catgory_id";
         
         $items = $conn->query($query_items);
   
         ?>
         
           <li class = "list">
             <div> <?php echo $catgory['name']; ?> </div>
             <div> <?php echo $items->num_rows; ?> </div>
           </li>
         
         <?php
       }
       ?>
       </ul>
       <?php
     }
     
/*
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
       <a href="details.php?id=<?php echo $row["id"] ?>&type=category" class="list">
       <li class="">
       <?php 
         echo $row["name"];
         
       ?>
       </li></a>
       <?php
       }}
       
       ?>
       </ul>
       <?php
      }
      else 
      {
       echo "لا توجد تصنيفات مضافة";     
      }
*/
  ?>
   
    </div>

 </body>
</html>