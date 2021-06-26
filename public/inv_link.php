
<?php
   require_once("../includes/db.php");
   
   if(isset($_POST['submit']))
   {
     $item_id = $_POST["item"];
     
     $inv_id = $_POST["inventory"];
  
     $expiry_date = $_POST["expiry_date"];
     
     $expiry_date = date('y-m-d',strtotime($expiry_date));
     
     $quantity = $_POST["quantity"];
     
   
    $query = "INSERT INTO store (item_id,inv_id,expiry_date,quantity) VALUE  ($item_id,$inv_id,'$expiry_date',$quantity)";
     
    if ($conn->query($query) === TRUE) 
    {
        //echo "New record created successfully";
    } else {
       //echo "Error: " . $query . "<br>" . $conn->error;
    } 
    
   }
  
include "../includes/layout/header.php";   
include "../includes/layout/nav.php";   
 ?>
 
   
   <h1>ربط المخازن </h1>
   <form action ="inv_link.php" method ="POST">
   
     <label>الصنف</label>
     <?php include "../includes/item_select.php"; ?>
     <label>المخزن</label>
     <?php include "../includes/inventory_select.php"; ?>
     <label>الكمية</label>
     <input type="number" required name="quantity"\>
     <label>تاريخ الصلاحية</label>
     <input type="date" required name="expiry_date" \>
     <input type="submit" value="إضافة" name="submit"\>
     
   </form>
   <div class="result">
   
   
   <?php 
          
     // Retrive data from mysql    
     $query = "SELECT * FROM medications";
     
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
         echo $row["name"];
         
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
<?php 
  include "../includes/layout/footer.php";
?>