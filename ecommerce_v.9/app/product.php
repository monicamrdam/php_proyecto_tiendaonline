<?php 
require_once("../config.php");
?>

<?php
include(FRONT.DS."header.php");
?>

<!--Video 28-29-30-31 si quiero hacerlo-->
<?php
  $query= query( "SELECT * FROM products WHERE id=".escape_string($_GET['id'])." ");
  confirm($query);

  while ($row = fetch_array($query)){
     echo $row['product_price'];
  }

?>


<?php
include(FRONT.DS."footer.php");
?>