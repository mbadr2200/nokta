<?php 
  require_once("../includes/db.php");
  require_once("../includes/functions.php");
  
  if(isset($_GET["cat_id"]))
  {
    // delete category logic here 
    
    $cat_id = $_GET["cat_id"];
    //echo "deleteing category with id of {$cat_id}";
    $result = deleteCategoryById($cat_id);
    redirect("/categories.php");
    
  }
  else if (isset($_GET["inv_id"]))
  {
    // delete inventory logic here 
    $inv_id = $_GET["inv_id"];
    $result = deleteInventoryById($inv_id)
    redirect("/inventories.php");
    
  }else if (isset($_GET["item_id"]))
  {
    // delete item logic here 
    $item_id = $_GET["item_id"];
    $result = deleteItemById($inv_id)
    redirect("/items.php");
    
  }
  
  
  
  
  
?>

