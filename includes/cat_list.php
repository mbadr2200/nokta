<?php 

     // Retrive data from mysql    
     
     $categories = getCategories();
     
     
     if($categories->num_rows > 0 )
     {
       ?>
       <ul class ="list_container">
       <?php
       while($catgory = $categories->fetch_assoc())
       {
         
         ?>
         
           <li class = "list">
             <div> <?php echo $catgory['name']; ?> </div>
             <div> <?php echo $catgory['items_count'] ?> </div>
           </li>
         
         <?php
       }
       ?>
       </ul>
       <?php
     }
     
  ?>