<?php

require_once('partials/init.inc');
require_once('database/database.php');

session_start();

$extra = 'index.php';

$db = new database();
$conectada = $db->connect();

$name = $_POST["name"];
$password = $_POST["password"];

$recordar = $_POST["recordar"];


$resultado = $db->getOne('NomUsuario', 'usuarios', $name);

$filas = mysqli_fetch_assoc($resultado);

if($filas['password'] == $password){
    if($recordar) setcookie('usuarioRecordar', $name, time() + 365*24*60*60);
    $_SESSION['usuarioSession'] = $filas;
    $extra = 'cuenta.php';
}

$db->close();

header("Location: http://$host$uri/$extra");

exit;


?>