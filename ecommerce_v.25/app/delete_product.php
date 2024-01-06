<?php
require_once("../config.php");


if (isset($_GET['delete_product_id'])) {


    $query = query("DELETE FROM products WHERE product_id = " . escape_string($_GET['delete_product_id']) . " ");
    confirm($query);


    set_message("Producto borrado.");
    redirect("admin.php?products");


} else {

    redirect("admin.php?products");


}



?>