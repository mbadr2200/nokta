<?php

function getItems ()
{
  global $conn ; 
  
  $query = "SELECT items.name AS item_name, inventroies.name AS inv_name , store.expiry_date , store.quantity , items.unit FROM inventroies , store , items WHERE store.item_id = items.id AND store.inv_id = inventroies.id";
  
     
  $items = $conn->query($query);
  
  return $items;
   
};

?>