<?php

  require_once("../includes/db.php");
     
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
     
  ?>
   
    </div>
<?php 
  include "../includes/layout/footer.php";
?>