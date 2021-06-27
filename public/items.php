<?php 
  require_once("../includes/db.php");
  require_once("../includes/functions.php");
  include "../includes/layout/header.php"; 
  $page_name = "items";
  include "../includes/layout/nav.php";
?> 

  <h1>الأصناف</h1>
  <?php include "../includes/layout/add_buttons.php"; ?>

  <div class="result">
    <?php include "../includes/items_list.php"?> 
  </div>

<?php include "../includes/layout/footer.php"; ?>