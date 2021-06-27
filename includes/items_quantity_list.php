<?php 
     
     
      $items = getItemsByCategory($category_id);

     if($items->num_rows > 0 )
     {
       ?>
       <ul class ="list_container">
       <?php 
  
       while($item = $items->fetch_assoc())
       {
        print_r($item); 
         ?>
         
           <a class = "list" href="/details.php?item=<?php echo $item['id']; ?>">
             <div> <?php echo $item['name'] ; ?> </div>
             <div> <?php
             if(is_null($item['total_quantity']))
             {
               echo "0" ;
             }else
             {
               echo $item['total_quantity']; 
             }
              
              ?> </div>
           </a>
         
         <?php
       }
       ?>
       </ul>
       <?php
     }
  ?>  