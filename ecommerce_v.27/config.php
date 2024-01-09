<?php

/*Creates a session or resumes the current session based on a session identifier passed through a GET or POST request, or passed through a cookie.*/
session_start();

/*Destroys all recorded information of a session */
//session_destroy();



defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);

//defined("FRONT") ? null : define ("FRONT", __DIR__.DS."templates\front");
defined("FRONT") ? null : define("FRONT", "C:/xampp/htdocs/ecommerce/ecommerce_v.27/app/templates/front");


//defined("BACK") ? null : define ("BACK", __DIR__.DS."templates\back");
defined("BACK") ? null : define("BACK", "C:/xampp/htdocs/ecommerce/ecommerce_v.27/app/templates/back");
defined("ADMIN") ? null : define("ADMIN", "C:/xampp/htdocs/ecommerce/ecommerce_v.27/app");
defined("UPLOAD_DIRECTORY") ? null : define("UPLOAD_DIRECTORY", "C:/xampp/htdocs/ecommerce/ecommerce_v.27/app/uploads");



defined("DB_HOST") ? null : define("DB_HOST", "localhost");
defined("DB_USER") ? null : define("DB_USER", "root");
defined("DB_PASSWORD") ? null : define("DB_PASSWORD", "");
defined("DB_NAME") ? null : define("DB_NAME", "discolandia_db");


$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

require_once("functions.php");
require_once("cart.php");

?>