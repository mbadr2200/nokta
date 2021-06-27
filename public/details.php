<?php 
  require_once("../includes/db.php");
  require_once("../includes/functions.php");
  include "../includes/layout/header.php"; 
  include "../includes/layout/nav.php";
?>

<?php
  
  if(isset($_GET["category"]))
  {
    // the page is for categories 
    $category_id = $_GET["category"];
    
    $categories = getCategoryById($category_id) ;
    
    if($categories->num_rows > 0 )
    {
      $category = $categories->fetch_assoc();
      
       
      $name = $category['name'];
       
    }
     
    
    
  }
  elseif(isset($_GET["inventory"]))
  {
     echo "inventory";
  }
  elseif(isset($_GET["item"]))
  {
    echo "item";
  }
  
  
  
?>
 
   <h1><?php if(isset($name)) {echo $name ;} ?></h1>
   
   <?php include "../includes/items_quantity_list.php"  ?>
   
   
   
<?php include "../includes/layout/footer.php"; ?>
