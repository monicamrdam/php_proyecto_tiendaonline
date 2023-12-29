<?php
require_once("../config.php");
?>

<?php
include(FRONT . DS . "header.php");
?>




<div class="container-fluid mt-5">
  <div class="row">
  <div class="col-lg-12 text-center">
            <h2 class="section-heading">Carrito de compra</h2>
            <br>
        <h4 class="text-center bg-dark text-light py-2">
      <?php display_message(); ?>
    </h4>
    <br>
    <form action="" method="post" enctype="multipart/form-data">
      <table class="table table-striped table-responsive">
        <thead>
          <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Sub total</th>

          </tr>
        </thead>
        <tbody>
          <?php cart() ?>
          </tr>
        </tbody>
      </table>
    </form>



    <!--  ***********CART TOTALS*************-->
    <div class="container float-end">
      <div class="col-xs-4  float-end">
        <h2>Total</h2>

        <table class="table table-bordered" cellspacing="0">

          <tr class="cart-subtotal">
            <th>Productos:</th>
            <td><span class="amount">
                <?php
                 echo isset($_SESSION['item_quantity']) ? $_SESSION['item_quantity'] : $_SESSION['item_quantity'] = "0" ;
                ?>
              </span></td>
          </tr>
          <tr class="shipping">
            <th>Envío</th>
            <td>Envío gratis</td>
          </tr>

          <tr class="order-total">
            <th>Total</th>
            <td><strong><span class="amount">
                  <?php
                  echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0";
                  ?>
                </span> €</strong> </td>
          </tr>


          </tbody>

        </table>

      </div><!-- CART TOTALS-->
    </div>

  </div><!--Main Content-->


  <?php
  include(FRONT . DS . "footer.php");
  ?>