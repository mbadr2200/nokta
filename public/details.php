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
      $items = getLinkedItems();
      echo "<h1>{$name}</h1>";
      echo "<div class ='delete_edit'>";
   echo "<a href='delete.php?cat_id=".$category["id"]."' class ='delete_btn'>مسح  ${category['name']}   <i class='far fa-trash-alt'></i></a>";
      echo "</div>";
      include "../includes/items_quantity_list.php";
       
    }

    
  }
  elseif(isset($_GET["inventory"]))
  {
     
     // if the page is for details 
     
     $inventory_id = $_GET["inventory"];
     $inventory_set = getInventoryDataById($inventory_id);
     
     if($inventory_set->num_rows > 0)
     {
        $inventory_data = $inventory_set->fetch_assoc();
        echo "<h1>{$inventory_data['name']}</h1>";
        echo "<div class ='delete_edit'>";
        echo "<a href='delete.php?cat_id=".$inventory_data["id"]."' class ='delete_btn'>مسح {$inventory_data['name']} <i class='far fa-trash-alt'></i></a>";
      echo "</div>";
        
     }
     
     $items = getItemsByInventory($inventory_id);
     
     if($items->num_rows > 0 )
      {
        $page = "inventory";
        include "../includes/items_list.php";  
      }
    
     
  }
  elseif(isset($_GET["item"]))
  {
    // the page is for items 
    $item_id = $_GET["item"];
    $items = getItemDataById($item_id);
    $total_quantity = getItemTotalQuantity($item_id);
    $item = getItemById($item_id);
    
    if($item->num_rows > 0)
    {
      $item = $item->fetch_assoc();
      echo "<h1>{$item['name']}</h1>";
      echo "<div class ='delete_edit'>";
      echo "<a href='delete.php?item_id=".$item["id"]."' class ='delete_btn'><i class='far fa-trash-alt'></i>مسح {$item['name']}</a>";
      echo "</div>";
    }
    echo "<h3>إجمالى الكمية :" . $total_quantity . "  " . $item['unit'] .  "<h3>";
    
    
    if($items->num_rows > 0 )
    {
      include "../includes/items_list.php";  
    }
    

  }
  
  
  
?>
   
   
   
<?php include "../includes/layout/footer.php"; ?>
