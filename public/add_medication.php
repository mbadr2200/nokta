<?php

  require_once("../includes/db.php");
  require_once("../includes/functions.php");
   
  if(isset($_POST['submit']))
  {
    $item_name = $_POST["item_name"];
    $unit = $_POST["unit"];
    $cat_id = $_POST["cat_id"];
      
    $query = "INSERT INTO items (name,unit,cat_id) VALUE  ('$item_name','$unit','$cat_id')";
     
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
 
  <h1>إضافة صنف </h1>
   
  <form action ="add_medication.php" method ="POST">
    <label>إسم الصنف</label>
    <input type="text" name="item_name" required minlength="5"\>
    <label>الوحدة</label>
    <input type="text" name="unit" required minlength="2"\>
    <label>التصنيف</label>
    <?php include "../includes/cat_select.php" ; ?>
    <input type="submit" value="إضافة" name="submit"\>
  </form>
   
  <div class="result">
    <?php include "../includes/items_list.php"?> 
  </div>

<?php 
  include "../includes/layout/footer.php";
?>