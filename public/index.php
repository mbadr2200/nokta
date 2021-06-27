<?php 
  include "../includes/layout/header.php";
  include "../includes/functions.php";
?>
   <h1>أختر الإضافة</h1>
   
     <?php 
     $page_name = "home";
     include "../includes/layout/nav.php"; 
     ?>
  
   <a href="/categories.php" class ="btn cat"><i class="fas fa-sitemap"></i> تصنيفات </a>
   <a href="/inventories.php" class ="btn inv"><i class="fas fa-boxes"></i> مخازن</a>
   <a href="/items.php" class ="btn item"><i class="fas fa-prescription-bottle"></i> أصناف</a>
   <a href="/inv_link.php" class ="btn inv_link"><i class="fas fa-link"></i> ربط مخازن</a>
   
<?php 

  include "../includes/layout/footer.php";
?>
 
