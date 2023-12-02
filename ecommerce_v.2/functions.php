<?php

function redirect($location)
{
    header("Location: $location");

}



function query($sql)
{
    global $connection;
    return mysqli_query($connection, $sql);
}




function confirm($result)
{
    global $connection;
    if (!$result) {
        die("Query failed" . mysqli_error($connection));
    }
}


//Se utiliza para evitar la inyección SQL en lugares como los formularios
function escape_string($string)
{
    global $connection;
    return mysli_real_scape_string($connection, $string);
}


function fetch_array($result)
{
    return mysqli_fetch_array($result);
}


?>