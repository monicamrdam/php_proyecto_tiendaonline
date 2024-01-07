<?php
require_once("../config.php");
?>

<?php
include(FRONT . DS . "header.php");
?>

<div class="container-fluid mt-5">
    <div class="card p-4 bg-light">
        <!---->
        <form action=" <?php print_cart(); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <div class="row">
                    <!-- first column-->

                    <div class="col-md-6">

                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Nombre: *" id="name"
                                required data-validation-required-message="Por favor introduce tu nombre.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <!-- -->

                        <div class="form-group">
                            <input type="text" name="surnames" class="form-control" placeholder="Apellidos: *"
                                id="surnames" required
                                data-validation-required-message="Por favor introduce tus apellidos."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <!-- -->

                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email:*" id="email"
                                required data-validation-required-message="Por favor introduce tu email.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <!-- -->

                        <div class="form-group">
                            <input type="number" name="phone" class="form-control" placeholder="Teléfono: *" id="phone"
                                required data-validation-required-message="Por favor introduce tu teléfono."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <!-- -->

                        <div class="form-group">
                            <input type="text" name="country" class="form-control" placeholder="País: *" id="country"
                                required data-validation-required-message="Por favor introduce tu país."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <!-- -->

                        <div class="form-group">
                            <input type="text" name="province" class="form-control" placeholder="Provincia: *"
                                id="province" required
                                data-validation-required-message="Por favor introduce tu provincia de envío."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <!-- -->

                        <div class="form-group">
                            <input type="text" name="municipality" class="form-control" placeholder="Municipio: *"
                                id="municipality" required
                                data-validation-required-message="Por favor introduce tu municipio de envío."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <!-- -->
                        <div class="form-group">

                            <input type="text" name="fulladdress" class="form-control"
                                placeholder="Direccion completa (calle, edificio, piso, escalera): *" id="fulladdress"
                                required
                                data-validation-required-message="Por favor introduce tu dirección completa."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                       
                        <!-- -->

                        <div class="form-group">

                            <input type="text" name="postalcode" class="form-control" placeholder="Código postal: *"
                                id="postalcode" required
                                data-validation-required-message="Por favor introduce tu código postal."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>

                    <!-- second column -->
                    <div class="col-md-2">
                    </div>

                    <!-- third column-->
                    <div class="col-md-4">
                        <div class="container float-start">
                            <div class="col-xs-4  float-start">
                                <h2>Total</h2>

                                <table class="table table-bordered" cellspacing="0">

                                    <tr class="cart-subtotal">
                                        <th>Productos:</th>
                                        <td><span class="amount">
                                                <?php
                                                echo isset($_SESSION['item_quantity']) ? $_SESSION['item_quantity'] : $_SESSION['item_quantity'] = "0";
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
                                <div class="col-lg-12 text-center">
                                    <br>
                                    <div id="success"></div>
                                    <button type="submit" name="submit" class="btn text-light bg-dark">Finalizar
                                        compra</button>
                                </div>
                            </div><!-- CART TOTALS-->



                        </div>

                    </div>

                </div>
                <!---->


        </form>

    </div>




    <?php


    //process_transaction();
    

    ?>


    <?php
    include(FRONT . DS . "footer.php");
    ?>