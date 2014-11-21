<?php
/**
 * Created by PhpStorm.
 * User: aletormat
 * Date: 14/11/14
 * Time: 13:40
 */

$ownEmail = "aletormat@gmail.com";
$webTitle = "35mm.com";

/* Redirecciona a una página diferente que se encuentra en el directorio actual */
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extraIndex = 'index.php';


$logged = false;


?>