<?php

require_once('database/database.php');
require_once('partials/init.inc');

session_start();
$host  = $_SERVER['HTTP_HOST'];
if(!isset($_SESSION['usuarioSession']) || !isset($_POST['password']) || !isset($_POST['passRep'])){
    $extra = 'index.php';
    header("Location: http://$host$uri/$extra");
    exit;
}else{
    $userSess = $_SESSION['usuarioSession'];
    $pass = $_POST['password'];
    $repPass = $_POST['passRep'];
}



if($pass == $repPass){
    $db = new database();
    $db->connect();



    $resultado = $db->updatePass($userSess['IdUsuarios'],$pass);


    $extra = "miCuenta.php?success=true";

//$extra = "registro.php?error=nombre";

    $db->close();


}
else{
    $extra = "miCuenta.php?error=true";

}


header("Location: http://$host$uri/$extra");
exit;