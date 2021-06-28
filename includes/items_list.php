<?php 
     
     
      

     if($items->num_rows > 0 )
     {
       ?>
       <ul class ="list_container">
       <?php 
      if(!isset($page))
               {
                 $page = null;
               }
       while($item = $items->fetch_assoc())
       {
         if($page != "general")
         {
           $expiry_date = $item['expiry_date'];
           $expiry_date = date("m-Y", strtotime($expiry_date));
         }
         
         ?>
         
           <a class = "list" href="/details.php?item=<?php echo $item['item_id']; ?>">
             <div> <?php echo $item['item_name'] ; ?> </div>
             
             <?php 
             if($page == "general")
             {
               echo "<div>".$item['category_name']."</div>";
             }
               // check if the page not the general items page
               
               if($page != "general")
               {
                 if($page != "inventory"){echo "<div>{$item['inv_name']}</div>";};
                 echo "<div>{$expiry_date}</div>";
                 echo "<div> {$item['quantity']} -<span>{$item['unit']}</span></div>";
               }
               
             ?>
             
           </a>
         
         <?php
       }
       ?>
       </ul>
       <?php
     }
  ?>  