<?php

require_once('database/database.php');
require_once('partials/init.inc');

session_start();
$host  = $_SERVER['HTTP_HOST'];
if(!isset($_SESSION['usuarioSession'])){
    $extra = 'index.php';
    header("Location: http://$host$uri/$extra");
    exit;
}else{
    $userSess = $_SESSION['usuarioSession'];
    $email = $_POST['email'];
    $sexo = $_POST['sexo'];
    $FNacimiento = $_POST['fecha'];
    $Ciudad = $_POST['ciudad'];
    $idPais = $_POST['pais'];
    $Foto = '1';
}


$date = DateTime::createFromFormat('d/m/Y', $FNacimiento);
$fecha = date_format($date, 'Y-m-d');

$db = new database();
$db->connect();



$resultado = $db->updateUser($userSess['IdUsuarios'],$email,$sexo,$fecha,$Ciudad,$idPais,$Foto);


$extra = "miCuenta.php?success=true";

    //$extra = "registro.php?error=nombre";

$db->close();

header("Location: http://$host$uri/$extra");
exit;