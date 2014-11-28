<?php
/**PHP**/
require_once('init.inc');
session_start();

$user = null;
$userRememb = false;
$userLogged = false;

if(isset($_SESSION['usuarioSession']))
    $userLogged = true;

else if(isset($_COOKIE['usuarioRecordar']) && !isset($_SESSION['usuarioSession'])){
    $user = $_COOKIE['usuarioRecordar'];
    $userRememb = true;
}


?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>

    <link rel="stylesheet" type="text/css" href="css/styleAlt.css" media="screen" title="Principal">
    <link rel="alternate stylesheet" type="text/css" href="css/style.css" media="screen" title="Alternativo">
    <link rel="alternate stylesheet" type="text/css" href="css/access.css" media="screen" title="Accesible">
    <link rel="alternate stylesheet" href="css/prueba.css" media="screen" title="Prueba"/>
    <link rel="stylesheet" type="text/css" href="css/print.css" media="print">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
    <script type="text/javascript" src="js/estilos.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

</head>
<body>
<div id="navegacion"><!--Barra de navg-->
    <nav class="navegacion">
        <ul>
            <li><a href="../35mm/index.php"><h1>35mm.com</h1></a></li>
            <li>
                <form class='basicBusq' action="../35mm/resbusq.php">
                    <input type="search" name="busq">
                    <input type="submit" value="Buscar" >
                </form>
            </li>
            <li><a href="../35mm/busqueda.php">Busqueda Avanzada</a></li>
            <?php if($userLogged==false && $userRememb == false ){ ?>
            <li id="login">
                <form class='login' method="post" action="accessControl.php" onsubmit="return(validateLogin(this));">
                    <input type="text" name="name" placeholder='Usuario'>
                    <input type="password" name="password" placeholder='Contraseña'>
                    <label>
                        <input type="checkbox" name="recordar">
                        Recordarme
                    </label>
                    <input type="submit" value='Entrar'>

                </form>
            </li>
            <?php } else if($userRememb==true && $userLogged==false){ ?>
                <li id="login">
                    <form class='login' method="post" action="returnAccess.php">
                        <label>Bienvenido de nuevo <?php echo($user); ?></label>
                        <input type="submit" value='Entrar'>
                    </form>
                </li>
                <li>
                    <form action="salir.php">
                        <input type="submit" value="Salir"/>
                    </form>
                </li>
            <?php } else{ ?>
                <li id="login">
                    <a href="cuenta.php">Mi cuenta</a>
                </li>
                <li>
                    <form action="salir.php">
                        <input type="submit" value="Salir"/>
                    </form>
                </li>
            <?php }?>
            <li>
                <select name="estilos" id="selEstilos">

                </select>
            </li>
        </ul>
    </nav>
</div>