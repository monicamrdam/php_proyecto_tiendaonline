<?php
require_once("../config.php");


if (isset($_GET['delete_product_merchandising_id'])) {


    $query = query("DELETE FROM merchandising  WHERE merchand_id = " . escape_string($_GET['delete_product_merchandising_id']) . " ");
    confirm($query);


    set_message("Producto borrado.");
    redirect("admin.php?products_merchandising");


} else {

    redirect("admin.php?products_merchandising");


}



?>