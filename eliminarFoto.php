<?php

require_once('database/database.php');
require_once('partials/init.inc');
require_once('utils/imageResize.php');
require_once('utils/sanearString.php');

session_start();
$host  = $_SERVER['HTTP_HOST'];
if(!isset($_SESSION['usuarioSession'])){
    $extra = 'index.php';
    header("Location: http://$host$uri/$extra");
    exit;
}
else{
    $userSess = $_SESSION['usuarioSession'];
}

$extra = "miCuenta.php?error=0";


$db = new database();
$db->connect();




$directorio = "photosProfile/";
$archivo = $userSess['IdUsuarios']. '.png';
$defecto = $directorio.'default.png';


$old = getcwd(); // Save the current directory
chdir($directorio);
$res = unlink($archivo);
chdir($old); // Restore the old working directory



if($res ==1){
    $db->get("UPDATE usuarios SET Foto = '$defecto' where IdUsuarios=".$userSess['IdUsuarios']);
    $extra = "miCuenta.php?error=4";
}

$db->close();

header("Location: http://$host$uri/$extra");
exit;