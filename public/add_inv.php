<?php 

 require_once("../includes/db.php");
 require_once("../includes/functions.php");
 
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
     

include "../includes/layout/header.php";
include "../includes/layout/nav.php"; 
?>
   <h1>إضافة مخزن </h1>
   <form action ="add_inv.php" method ="POST">
   
     <label>إسم المخزن</label>
     <input type="text" name="inv_name" required\>
     <input type="submit" value="إضافة" name="submit"\>
     
   </form>
   <div class="result">
   
   
   <?php 
         
            
     // Retrive data from mysql    
     
     
     $query_inventroies = "SELECT * FROM inventroies";
     
     
     $inventroies = $conn->query($query_inventroies);
     
     
     if($inventroies->num_rows > 0 )
     {
       ?>
       <ul class ="list_container">
       <?php
       while($inventory = $inventroies->fetch_assoc())
       {
         $inventory_id = $inventory['id'];
         
         $query_items = "SELECT * FROM store WHERE inv_id = $inventory_id";
         
         $items = $conn->query($query_items);
   
         ?>
         
           <li class = "list">
             <div> <?php echo $inventory['name']; ?> </div>
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