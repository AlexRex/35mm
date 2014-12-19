<?php

$title = "Inicio / 35mm.com";


$success = $_GET['success'];
require_once('database/database.php');


$db = new database();
$conectada = $db->connect();

$resultado = $db->getAll('paises', 'NomPais', 'ASC');

$db->close();

$user = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['password'];
$repPass = $_POST['passRep'];


$msgError = array(0 => "Error desconocido.",
    1 => "Es necesario introducir un título.",
    2 => "El archivo ya existe.",
    3 => "Foto no válida."
);
$error = $msgError[$_GET['error']];

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



</head>
<body>
<!--CONTENIDO-->
    <div id="cuerpoReg"><br>
        <div class="registro">
            <div class="atrasRegistro"><a href="index.php">&#8636; Volver</a></div>

            <?php
                    if($error) echo ('<p class="errorMsg">'.$error.'</p>');
                    else if($success) echo ('<p class="successMsg">Registro completado con éxito</p>');
                ?>
            <form class='registroForm' action="crearUsuario.php" onsubmit="return(validate(this));" method="post" enctype="multipart/form-data">
                <input type="text" name="name" placeholder='Nombre de usuario' value="<?php echo $user ?>">
                <input type="email" name="email" placeholder='Email' value="<?php echo $email ?>">
                <input type="password" name="password" placeholder='Contraseña' value="<?php echo $pass ?>">
                <input type="password" name="passRep" placeholder='Repite contraseña' value="<?php echo $repPass ?>">
                <select name="sexo" required>
                    <option value="0">Hombre</option>
                    <option value="1">Mujer</option>
                </select>
                <input type="text" name="fecha" placeholder="Fecha de Nacimiento: aaaa-mm-dd">
                <input type="text" name="ciudad" placeholder='Ciudad'>

                <select name="pais">
                    <?php
                        while($filas = mysqli_fetch_assoc($resultado)) {
                            echo('<option value="' . $filas["IdPais"] . '">' . $filas["NomPais"] . '</option>');
                        }
                    ?>
                </select>
                Foto <input type="file" name="fichero">
                <input class="registrarse" type="submit" value='Registrarse'>
            </form>
        </div>
    </div>

</body>
</html>

