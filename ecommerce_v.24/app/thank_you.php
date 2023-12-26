<?php 
require_once("../config.php");
?>

<?php
include(FRONT.DS."header.php");
?>

<?php


process_transaction();


 ?>
<!-- Page Content -->
<div class="container">
         <div class="jumbotron">
             <h1 class="text-center">GRACIAS</h1>
             <p class="text-center">Gracias, tu pedido ha sido procesado, deberías recibir un correo electrónico pronto.</p>

         </div>


    </div>
    <!-- /.container -->

<?php
include(FRONT.DS."footer.php");
?>