<?php 
require_once("../config.php");
?>

<?php
include(FRONT.DS."header.php");
?>



 <div class="contenedor  py-5 ml-5">
  <div class="row d-flex justify-content-center">
  <?php
   
      $query ="SELECT * FROM categories";
      $send_query= mysqli_query($connection, $query);

      if (!$send_query){
            die ("Query failed".mysqli_error($connection));
      }

      //muestra las filas de la tabla
      while($row=mysqli_fetch_array($send_query)){
            echo "<a href= ''>{$row['cat_title']}</a>";
      }

  ?>  
  </div>
</div>

<?php
include(FRONT.DS."footer.php");
?>

  