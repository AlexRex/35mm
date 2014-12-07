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
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];
    $pais = $_POST['pais'];
    $userSess = $_SESSION['usuarioSession'];
}

if($titulo==''){
    $extra = 'crearAlbum.php?error=true';
    header("Location: http://$host$uri/$extra");
    exit;
}


$date = DateTime::createFromFormat('d/m/Y', $fecha);
$fecha = date_format($date, 'Y-m-d');

$db = new database();
$db->connect();

$resultado = $db->addAlbum($titulo, $descripcion, $fecha, $pais, $userSess['IdUsuarios']);

$db->close();
$extra = 'crearAlbum.php?success=true';
header("Location: http://$host$uri/$extra");
exit;