<?php

session_start();
$host  = $_SERVER['HTTP_HOST'];
if(!isset($_SESSION['usuarioSession'])){
    $extra = 'index.php';
    header("Location: http://$host$uri/$extra");
    exit;
}else{
    $user = $_SESSION['usuarioSession'];
}

$db = new database();
$db->connect();

$sent = "SELECT * FROM usuarios where IdUsuarios=".$user['IdUsuarios'];


$user = $db->get($sent);

$foto = mysqli_fetch_assoc($user)['Foto'];
$db->close();

require_once('partials/header.inc');
require_once('database/database.php');


?>
<!--CONTENIDO-->
<div id="cuerpoCuenta">
    <div class="headerUsuario">
        <div class="descUsuario">

            <div class="imgUser"><img id="imgUser" src="<?php echo $foto?>" alt=""/></div>
            <h2><?php echo($user['NomUsuario']) ?></h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                Duis aute irure dolor in reprehenderit in voluptate velit esse cil.</p>
        </div>
    </div>
    <div class="navUsuario">
        <ul class="listNavUsuario">
            <li><a href="cuenta.php">Mis fotos</a></li>
            <li><a href="albumes.php">Mis álbumes</a></li>
            <li><a href="miCuenta.php">Configuración</a></li>
            <li class="floatRight"><a href="fotoAlbum.php">Añadir foto a álbum</a></li>
            <li class="floatRight"><a href="subirImagen.php">Subir nueva imágen</a></li>
            <li class="floatRight"><a href="crearAlbum.php">Crear álbum</a></li>
            <li class="floatRight"><a href="descargarAlbum.php">Descargar álbum</a></li>
        </ul>
    </div>

    <script>
        var url = document.getElementById("imgUser").src;
        document.getElementsByClassName("imgUser")[0].style.background = 'url('+url+') no-repeat center';
    </script>