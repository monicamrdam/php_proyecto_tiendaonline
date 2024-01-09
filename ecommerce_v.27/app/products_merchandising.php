<?php
require_once("../config.php");
?>



<div class="row">

  <h1 class="page-header">
    Todos los productos de merchandising

  </h1>
  <h3 class="bg-success">
    <?php display_message() ?>
  </h3>
  <table class="table table-hover">


    <thead>

      <tr>
        <th>Id</th>
        <th>Titulo</th>
        <th>Descripción larga</th>
        <th>Descripción corta</th>
        <th>Categoría</th>
        <th>Precio</th>
        <th>Cantidad</th>
      </tr>
    </thead>
    <tbody>

      <?php get_products_merchandising() ?>
    </tbody>
  </table>