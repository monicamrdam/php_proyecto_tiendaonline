<?php


if (isset($_GET['id'])) {

  $query = query("SELECT * FROM orders WHERE order_transaction_id = '".$_GET['id']."'");
  confirm($query);

  while ($row = fetch_array($query)) {
    $order_transaction_id  = escape_string($row['order_transaction_id']);
    $order_quantity  = escape_string($row['order_quantity']);
    $order_amount  = escape_string($row['order_amount']);
    $order_status = escape_string($row['order_status']);
  }


  update_order();

}

?>

<h1 class="page-header">
    Editar orden
    <small></small>
</h1>

<div class="col-md-12 user_image_box">

    <a href="#" data-toggle="modal" data-target="#photo-library"><img class="img-responsive" src="" alt=""></a>

</div>


<form action="" method="post" enctype="multipart/form-data">

    <div class="col-md-6">

    <div class="form-group">
            <label for="order_transaction_id">Referencia transacción</label>
            <input type="text" name="order_transaction_id" class="form-control"value="<?php echo $order_transaction_id; ?>" >

        </div>
        <div class="form-group">
            <label for="order_quantity">Cantidad</label>
            <input type="text" name="order_quantity" class="form-control"value="<?php echo $order_quantity; ?>" >

        </div>

        <div class="form-group">
            <label for="order_amount">Importe</label>
            <input type="text" name="order_amount" class="form-control"value="<?php echo $order_amount; ?>" >

        </div>

        <div class="form-group">
            <label for="order_status">Estado</label>
            <input type="text" name="order_status" class="form-control"value="<?php echo $order_status; ?>" >

        </div>


        <div class="form-group">

            <input type="submit" name="update_orde" class="btn btn-primary pull-right" value="Actualizar orden">

        </div>

    </div>

    </div>

</form>