<?php

function getLinkedItems ()
{
  global $conn ; 
  
  $query = "SELECT items.id AS item_id , items.cat_id AS cat_id ,items.name AS item_name, inventroies.name AS inv_name , store.expiry_date , store.quantity , items.unit FROM inventroies , store , items WHERE store.item_id = items.id AND store.inv_id = inventroies.id";
  
     
  $items = $conn->query($query);
  
  return $items;
   
};

function getAllItems()
{
   global $conn ; 
  
  $query = "SELECT items.name AS item_name , items.id AS item_id , items.unit AS unit , categories.name AS category_name FROM items  JOIN categories ON items.cat_id = categories.id ORDER BY categories.name , items.name";
  
     
  $items = $conn->query($query);
  
  return $items;
}
function getItemsByInventory($inv_id)
{
  
  global $conn ; 
  
  $query = "SELECT store.item_id , items.name AS item_name, items.unit AS unit, store.expiry_date AS expiry_date , store.quantity AS quantity , inventroies.name as inv_name FROM store LEFT JOIN items ON items.id = store.item_id LEFT JOIN inventroies ON inventroies.id = store.inv_id WHERE store.inv_id = $inv_id ORDER BY items.name";
  
     
  $items = $conn->query($query);
  
  return $items;
  
}
function getItemsByCategory ($cat_id)
{
  global $conn ; 
  
  $query = "SELECT items.id , items.name , SUM(store.quantity) AS total_quantity FROM items LEFT JOIN store ON items.id = store.item_id WHERE items.cat_id = $cat_id GROUP BY items.id";
  
     
  $items = $conn->query($query);
  
  return $items;
   
};
function getItemById($item_id)
{
  global $conn ; 
  $query = "SELECT * FROM items WHERE id = $item_id LIMIT 1";
  $item = $conn->query($query);
  
  return $item;
  
}
function getItemDataById($item_id)
{
  global $conn ; 
  
  $query = "SELECT items.id AS item_id ,items.name AS item_name , items.unit AS unit , inventroies.name AS inv_name , inventroies.id AS inventory_id , store.quantity AS quantity , store.expiry_date AS expiry_date  FROM store  JOIN inventroies ON store.inv_id = inventroies.id AND item_id = $item_id JOIN items ON store.item_id = items.id ";
  
     
  $items = $conn->query($query);
  
  return $items;
}

function getInventoryDataById($inv_id)
{
  global $conn ; 
  
  $query = "SELECT * FROM inventroies WHERE id = $inv_id";
  
     
  $inventory = $conn->query($query);
  
  return $inventory;
}

function getItemTotalQuantity($item_id){
  global $conn ; 
  
  $query = "SELECT SUM(store.quantity) AS total_quantity, items.name FROM store JOIN items ON items.id = store.item_id WHERE item_id = $item_id";
  
     
  $total_quantity = $conn->query($query);
  $total_quantity = $total_quantity->fetch_assoc();
  
  return $total_quantity['total_quantity'];
}
function getCategories()
{
  global $conn ; 
  
  $query = "SELECT categories.id , categories.name , COUNT(items.id) AS items_count FROM categories LEFT JOIN items ON categories.id = items.cat_id GROUP BY categories.name";
  
     
  $categories = $conn->query($query);
  
  return $categories;
}

function getCategoryById ($id)
{
  global $conn ; 
  
  $query = "SELECT * FROM categories WHERE id = $id LIMIT 1";
  
     
  $category = $conn->query($query);
  
  return $category;
}

function getInventories()
{
  global $conn ; 
  
  $query = "SELECT inventroies.id , inventroies.name , COUNT(store.id) AS items_count FROM inventroies LEFT JOIN store ON inventroies.id = store.inv_id GROUP BY inventroies.name";
  
     
  $inventroies = $conn->query($query);
  
  return $inventroies;
}

function nav_active($page_name,$tab)
{
  if($page_name == $tab)
  {
    echo "active";
  }
}
function redirect($url)
{
  header("Location:{$url}");
}

function deleteCategoryById($cat_id)
{
  
  global $conn ; 
  
  $query = "DELETE FROM categories WHERE id = $cat_id";
  $result = $conn->query($query);
  $affected_rows = $conn -> affected_rows;
  
  if($result && $affected_rows == 1 )
  {
    return "Category deleted ";
  }
  else
  {
    return "Category deletion failed";
  }
}
function deleteInventoryById($inv_id)
{
  
  global $conn ; 
  
  $query = "DELETE FROM inventroies WHERE id = $inv_id";
  $result = $conn->query($query);
  $affected_rows = $conn -> affected_rows;
  
  if($result && $affected_rows == 1 )
  {
    return "Inventory deleted ";
  }
  else
  {
    return "Inventory deletion failed";
  }
}
function deleteItemById($item_id)
{
  
  global $conn ; 
  
  $query = "DELETE FROM items WHERE id = $item_id";
  $result = $conn->query($query);
  $affected_rows = $conn -> affected_rows;
  
  if($result && $affected_rows == 1 )
  {
    return "Item deleted ";
  }
  else
  {
    return "Item deletion failed";
  }
}
?>