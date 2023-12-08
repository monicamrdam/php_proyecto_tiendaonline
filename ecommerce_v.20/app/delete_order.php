<?php
require_once("../config.php");

if (isset($_GET['delete_order_id'])) {

    $query = query("DELETE FROM orders WHERE order_id = " . escape_string($_GET['delete_order_id']) . " ");
    confirm($query);

    set_message("Orden eliminada");
    redirect("admin.php?orders");


} else {
    redirect("admin.php?orders");
}


?>