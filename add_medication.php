<html>
<?php
   include "db.php";
   
   if(isset($_POST['submit']))
   {
     $item_name = $_POST["item_name"];
     $unit = $_POST["unit"];
     $cat_id = $_POST["cat_id"];
     
     //$expiry_date = $_POST["expiry_date"];
     
     //$expiry_date = date('y-m-d',strtotime($expiry_date));
     
   
    $query = "INSERT INTO items (name,unit,cat_id) VALUE  ('$item_name','$unit','$cat_id')";
     
    if ($conn->query($query) === TRUE) 
    {
        //echo "New record created successfully";
    } else {
       //echo "Error: " . $query . "<br>" . $conn->error;
    } 
    
   }
  
   
 ?>
 
 <head>
 <link rel="stylesheet" href="/style.css">
 
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Test</title>
 </head>
 <body>
 
   <a href="/index.php" class ="btn"> الرئيسية </a>
   <h1>إضافة صنف </h1>
   <form action ="add_medication.php" method ="POST">
   
     <label>إسم الصنف</label>
     <input type="text" name="item_name" required minlength="5"\>
     <label>الوحدة</label>
     <input type="text" name="unit" required minlength="2"\>
     <label>التصنيف</label>
     <?php include "cat_select.php" ; ?>
     <input type="submit" value="إضافة" name="submit"\>
     
   </form>
   <div class="result">
   
   
   <?php 
          
     // Retrive data from mysql    
     $query = "SELECT * FROM items";
     
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
       </ul>
       <?php
       if(!empty($row["name"])){
       ?>
       <li class="list">
       <?php 
         echo $row["name"] ;
         
       ?>
       </li>
       <?php
       }}
       
      }
      else 
      {
       echo "لا توجد أصناف مضافة";     
      }
  ?>
   
    </div>

 </body>
</html>