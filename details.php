<html>
<?php 
  include "db.php";
  
  
  
  if(isset($_GET["id"]))
  {
    
    $id = $_GET["id"];
    $type = $_GET["type"];
    
    $query = "SELECT * FROM medications WHERE cat_id =$id";
    
    $result = $conn->query($query);
    
    if($type == "category")
    {
      $query= "SELECT * FROM categories WHERE ID = $id";
    }elseif ($type=="inventory")
    {
       $query= "SELECT * FROM inventories WHERE ID = $id";
    }
    
    $categories = $conn->query($query);
    
  if(isset($_POST["delete"]))
  {
    $id_to_delete = $_POST["id_to_delete"];
    
    if($type == "category")
    {
      $query= "DELETE FROM categories WHERE ID = $id_to_delete";
    }elseif ($type=="inventory")
    {
       $query= "DELETE  * FROM inventories WHERE ID = $id_to_delete";
    }
    
    if($conn->query($query))
    {
      header("Location:index.php");
    }
    else
    {
      echo "query error";
    }
    
  }
  
?>
 <head>
 <link rel="stylesheet" href="/style.css">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Test</title>
 </head>
 <body>
   <a href="/index.php" class ="btn"> الرئيسية </a>
   <h1><?php
   if($categories->num_rows > 0)
    {
      $category = $categories->fetch_assoc();
      echo "تفاصيل " . $category["name"];
            echo "bahy el 5awl";    }
   
   
    ?></h1>
   <?php 
   
      if ($result->num_rows > 0) 
     {
       
       ?>
       <ul>
       <?php
       while($item = $result->fetch_assoc()) {
         
         ?>
         
           <li class ="list"> <?php echo $item["name"] ?> </li>
         
         <?php
         
       }
       ?>
       </ul>
       <?php
     }else
     {
       echo "<p class ='text'>لا توجد عناصر مضافة</p>";
     }
    
    
  }


   ?>
   <form action="details.php" method="DELETE">
   <?php 
   if($categories->num_rows > 0)
    {
      $category = $categories->fetch_assoc();
      echo $category["id"];
    }?>
     <input type="hidden" name="id_to_delete" value= <?php echo $category["id"]  ?>>
     <input type="submit" class="btn del_btn"value ="مسح التصنيف" name="delete">
   </form>
 </body>
</html>
