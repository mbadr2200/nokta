<?php

function getLinkedItems ()
{
  global $conn ; 
  
  $query = "SELECT items.name AS item_name, inventroies.name AS inv_name , store.expiry_date , store.quantity , items.unit FROM inventroies , store , items WHERE store.item_id = items.id AND store.inv_id = inventroies.id";
  
     
  $items = $conn->query($query);
  
  return $items;
   
};

function getCategories()
{
  global $conn ; 
  
  $query = "SELECT categories.name , COUNT(items.id) AS items_count FROM categories LEFT JOIN items ON categories.id = items.cat_id GROUP BY categories.name";
  
     
  $categories = $conn->query($query);
  
  return $categories;
}

function getInventories()
{
  global $conn ; 
  
  $query = "SELECT inventroies.name , COUNT(store.id) AS items_count FROM inventroies LEFT JOIN store ON inventroies.id = store.inv_id GROUP BY inventroies.name";
  
     
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

?>