<?php 
     
     
      $items = getItems();

     if($items->num_rows > 0 )
     {
       ?>
       <ul class ="list_container">
       <?php 
  
       while($item = $items->fetch_assoc())
       {
          
         ?>
         
           <li class = "list">
             <div> <?php echo $item['item_name'] ; ?> </div>
             <div> <?php echo $item['inv_name']; ?> </div>
             <div> <?php echo $item['expiry_date']; ?> </div>
             <div> <?php echo $item['quantity'] . " - " ; ?> <span><?php echo $item['unit']; ?></span> </div>
           </li>
         
         <?php
       }
       ?>
       </ul>
       <?php
     }
  ?>  