<?php

require_once('partials/init.inc');
require_once('database/database.php');

session_start();

$name = $_COOKIE['usuarioRecordar'];


$extra = 'index.php?log=error';

$db = new database();
$conectada = $db->connect();


$resultado = $db->getOne('NomUsuario', 'usuarios', $name);

$filas = mysqli_fetch_assoc($resultado);

if($filas){
    setcookie('usuarioRecordar', $name, time() + 365*24*60*60);
    $_SESSION['usuarioSession'] = $filas;
    $extra = 'cuenta.php';
}
else{
    $extra = 'salir.php';
}

$db->close();

header("Location: http://$host$uri/$extra");
exit;


?>


