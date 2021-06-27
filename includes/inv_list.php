<?php 

     // Retrive data from mysql    
     
     $inventroies = getInventories();
     
     
     if($inventroies->num_rows > 0 )
     {
       ?>
       <ul class ="list_container">
       <?php
       while($inventory = $inventroies->fetch_assoc())
       {
         
         ?>
         
           <li class = "list">
             <div> <?php echo $inventory['name']; ?> </div>
             <div> <?php echo $inventory['items_count'] ?> </div>
           </li>
         
         <?php
       }
       ?>
       </ul>
       <?php
     }
     
  ?>