<?php
/**PHP**/
?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>

    <link rel="stylesheet" type="text/css" href="../35mm/css/styleAlt.css" media="screen" title="Principal">
    <link rel="alternate stylesheet" type="text/css" href="../35mm/css/style.css" media="screen" title="Alternativo">
    <link rel="alternate stylesheet" type="text/css" href="../35mm/css/access.css" media="screen" title="Accesible">
    <link rel="stylesheet" type="text/css" href="../35mm/css/print.css" media="print">
    <link rel="icon" href="../35mm/img/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon"/>
    <script type="text/javascript" src="../35mm/js/estilos.js"></script>
    <script type="text/javascript" src="../35mm/js/main.js"></script>

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
            <li id="login">
                <form class='login' method="post" action="accessControl.php" onsubmit="return(validateLogin(this));">
                    <input type="text" name="name" placeholder='Usuario'>
                    <input type="password" name="password" placeholder='Contraseña'>
                    <input type="submit" value='Entrar'>
                </form>
            </li>

            <li>
                <select name="estilos" id="selEstilos">

                </select>
            </li>
        </ul>
    </nav>
</div>