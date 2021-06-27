

<?php 
  if(!isset($page_name))
  {
    $page_name = null ;
  }
?>

<div class="tabs" id="tabs">
  <a class="tab <?php nav_active($page_name,'home')?> " href="/index.php">
    <i class="fas fa-home"></i>
    <p> الرئيسية </p>
  </a>
  <a class="tab <?php nav_active($page_name,'items')?> " href="/items.php">
    <i class="fas fa-prescription-bottle"></i>
    <p> أصناف </p>
  </a>
  <a class="tab <?php nav_active($page_name,'cat')?> " href="/categories.php">
    <i class="fas fa-sitemap"></i>
    <p> تصنيفات </p>
  </a>
  <a class="tab <?php nav_active($page_name,'inv')?> " href="/inventories.php">
    <i class="fas fa-boxes"></i>
    <p> مخازن </p>
  </a>
  <a class="tab <?php nav_active($page_name,'link')?> " href="/inv_link.php">
    <i class="fas fa-link"></i>
    <p>ربط </p>
  </a>
</div>