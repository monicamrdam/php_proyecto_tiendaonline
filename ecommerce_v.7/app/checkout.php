<?php 
require_once("../config.php");
?>

<?php
include(FRONT.DS."header.php");
?>

<?php 
if(isset($_SESSION['product_1'])){
    echo $_SESSION['product_1'];
}
?>


<div class="container">
<div class="row">
      <h4 class="text-center bg-dark text-light py-2"><?php display_message();?></h4>
      <h1>Checkout</h1>

    <form action="">
    <table class="table table-striped table-responsive">
        <thead>
          <tr>
           <th>Product</th>
           <th>Price</th>
           <th>Quantity</th>
           <th>Sub-total</th>
     
          </tr>
        </thead>
        <tbody>
           <?php  cart()?>
            </tr>
        </tbody>
    </table>
</form>



<!--  ***********CART TOTALS*************-->
<div class="container float-end">
<div class="col-xs-4  float-end">
<h2>Cart Totals</h2>

<table class="table table-bordered" cellspacing="0">

<tr class="cart-subtotal">
<th>Items:</th>
<td><span class="amount">4</span></td>
</tr>
<tr class="shipping">
<th>Shipping and Handling</th>
<td>Free Shipping</td>
</tr>

<tr class="order-total">
<th>Order Total</th>
<td><strong><span class="amount">$3444</span></strong> </td>
</tr>


</tbody>

</table>

</div><!-- CART TOTALS-->
</div>

 </div><!--Main Content-->


 <?php
include(FRONT.DS."footer.php");
?>

  