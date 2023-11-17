<?php 
require_once("../config.php");
?>

<?php

if(isset($_GET['add'])){
  $_SESSION['product_'.$_GET['add']] +=1;

  redirect("catalog.php");
}
?>