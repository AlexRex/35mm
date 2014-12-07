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
    $album = $_POST['album'];
    $userSess = $_SESSION['usuarioSession'];
}

if($titulo==''){
    $extra = 'subirImagen.php?error=true';
    header("Location: http://$host$uri/$extra");
    exit;
}


$date = DateTime::createFromFormat('d/m/Y', $fecha);
$fecha = date_format($date, 'Y-m-d');

$db = new database();
$db->connect();


$resultado = $db->addImagen($titulo, $descripcion, $fecha, $pais, $album, $userSess['IdUsuarios'], '');


$db->close();
$extra = 'foto.php?id='.$resultado;
header("Location: http://$host$uri/$extra");
exit;