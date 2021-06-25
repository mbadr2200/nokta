<select name= "cat_id" required>
      <?php
      include "db.php";
      // Retrive data from mysql    
       $query = "SELECT * FROM categories";
     
       $result = $conn->query($query);

       if ($result->num_rows > 0) 
       {
         while($row = $result->fetch_assoc()){
                   
          if(!empty($row["name"]))
          {
           ?>
           
           <option value =<?php echo "'". $row["id"]."'"?>><?php echo $row["name"] ?></option>
           
           <?php
          }
         }  
       }
  
       
      ?>
     </select>