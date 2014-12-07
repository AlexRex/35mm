<?php

require_once('database/database.php');
require_once('partials/init.inc');

session_start();
$host  = $_SERVER['HTTP_HOST'];
if(!isset($_SESSION['usuarioSession']) || !isset($_POST['password'])){
    $extra = 'index.php';
    header("Location: http://$host$uri/$extra");
    exit;
}else{
    $userSess = $_SESSION['usuarioSession'];
    $pass = md5($_POST['password']);
}
$db = new database();
$db->connect();

$sent = "SELECT * from usuarios where IdUsuarios=".$userSess['IdUsuarios'];


$usuDB = mysqli_fetch_assoc($db->get($sent));





if($pass == $usuDB['password']){




    $resultado = $db->deleteUser($usuDB['IdUsuarios']);


    $extra = "salir.php";

//$extra = "registro.php?error=nombre";



}
else{
    $extra = "miCuenta.php?error=true";

}
$db->close();


header("Location: http://$host$uri/$extra");
exit;