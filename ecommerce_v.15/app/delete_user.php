<?php
require_once("../config.php");


if(isset($_GET['delete_user_id'])) {


$query = query("DELETE FROM users WHERE user_id = " . escape_string($_GET['delete_user_id']) . " ");
confirm($query);


set_message("User Deleted");
redirect("admin.php?users");


} else {

redirect("admin.php?users");


}






 ?>