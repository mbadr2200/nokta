<?php 
  require_once("../includes/db.php");
  require_once("../includes/functions.php");
  include "../includes/layout/header.php"; 
  $page_name="cat";
  include "../includes/layout/nav.php";
  
  if (isset($_DELETE["cat_id"]))
  {
    echo $_DELETE["cat_id"];
  }
?> 

  <h1>التصنيفات</h1>
  
  <?php include "../includes/layout/add_buttons.php"; ?>

  <div class="result">
    <?php include "../includes/cat_list.php"?> 
  </div>

<?php include "../includes/layout/footer.php"; ?>