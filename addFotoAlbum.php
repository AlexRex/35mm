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
    $foto = $_POST['foto'];
    $album = $_POST['album'];
}

$db = new database();
$db->connect();



$resultado = $db->addFotoAlbum($foto, $album);


$extra = "fotoAlbum.php?success=true";

//$extra = "registro.php?error=nombre";

$db->close();

header("Location: http://$host$uri/$extra");
exit;