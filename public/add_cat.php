<?php

  require_once("../includes/db.php");
  require_once("../includes/functions.php");
     
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
<?php 
  include "../includes/layout/header.php";
  include "../includes/layout/nav.php"; 
?> 
   
   <h1>إضافة تصنيف </h1>
   <form action ="add_cat.php" method ="POST">
   
     <label>إسم تصنيف</label>
     <input type="text" name="cat_name" required\>
     <input type="submit" value="إضافة" name="submit"\>
     
   </form>
   <div class="result">
     <h4>التصنيفات</h4>
     <?php include "../includes/cat_list.php"?>      
   </div>
<?php 
  include "../includes/layout/footer.php";
?>