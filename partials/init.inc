<?php

$ownEmail = "aletormat@gmail.com";
$webTitle = "35mm.com";

/* Redirecciona a una página diferente que se encuentra en el directorio actual */
$host = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extraIndex = 'index.php';


$logged = false;


?>