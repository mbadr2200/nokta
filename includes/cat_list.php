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
           
           <a class = "list" href="details.php?category=<?php echo $catgory['id']?>"">
             <div> <?php echo $catgory['name']; ?> </div>
             <div> <?php echo $catgory['items_count'] ?> </div>
           </a>
         
         <?php
       }
       ?>
       </ul>
       <?php
     }
     
  ?>