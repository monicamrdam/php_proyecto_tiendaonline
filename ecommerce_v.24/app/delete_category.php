<?php
require_once("../config.php");

if (isset($_GET['delete_category_id'])) {


    $query = query("DELETE FROM categories WHERE cat_id = " . escape_string($_GET['delete_category_id']) . " ");

    
    confirm($query);


    set_message("Categoria borrada.");
    redirect("./admin.php?categories");


} else {

    redirect("./admin.php?categories");


}


?>