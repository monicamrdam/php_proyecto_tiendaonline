
<?php
/*Con PHP podemos almacenar la salida, a medida que se va generando, en un buffer. De modo que no se envíe ningún dato al cliente hasta que se indique expresamente. */
//ob_start();

/*crea una sesión o reanuda la actual basada en un identificador de sesión pasado mediante una petición GET o POST, o pasado mediante una cookie.  */
session_start();

/*Destruye toda la información registrada de una sesión */
//session_destroy();



defined("DS") ? null : define("DS",DIRECTORY_SEPARATOR );

//defined("FRONT") ? null : define ("FRONT", __DIR__.DS."templates\front");
defined("FRONT") ? null : define ("FRONT", "C:/xampp/htdocs/ecommerce/ecommerce_v.18/app/templates/front");


//defined("BACK") ? null : define ("BACK", __DIR__.DS."templates\back");
defined("BACK") ? null : define ("BACK", "C:/xampp/htdocs/ecommerce/ecommerce_v.18/app/templates/back");
defined("ADMIN") ? null : define ("ADMIN", "C:/xampp/htdocs/ecommerce/ecommerce_v.18/app");
defined("UPLOAD_DIRECTORY") ? null : define ("UPLOAD_DIRECTORY", "C:/xampp/htdocs/ecommerce/ecommerce_v.18/app/uploads");



defined("DB_HOST") ? null : define ("DB_HOST", "localhost");
defined("DB_USER") ? null : define ("DB_USER", "root");
defined("DB_PASSWORD") ? null : define ("DB_PASSWORD", "");
defined("DB_NAME") ? null : define ("DB_NAME", "ecom_paypal");


$connection= mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD, DB_NAME); 

require_once("functions.php");
require_once("cart.php");

?>

