<?php

session_start();

session_destroy();

header("Location: ../app/landingpage.php");

?>