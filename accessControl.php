<?php

require_once('partials/init.inc');
require_once('database/database.php');

session_start();

$extra = 'index.php?error=0';

$db = new database();
$conectada = $db->connect();

$name = $_POST["name"];
$password = md5($_POST["password"]);



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