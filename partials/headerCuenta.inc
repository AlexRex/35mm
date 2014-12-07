<?php

require_once('partials/header.inc');



?>
<!--CONTENIDO-->
<div id="cuerpoCuenta">
    <div class="headerUsuario">
        <div class="descUsuario">

            <div class="imgUser"><img src="http://cdn.bavotasan.com/wp-content/uploads/2011/02/desktop.jpg" alt=""/></div>
            <h2><?php echo($user['NomUsuario']) ?></h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                Duis aute irure dolor in reprehenderit in voluptate velit esse cil.</p>
        </div>
    </div>
    <div class="navUsuario">
        <ul class="listNavUsuario">
            <li><a href="cuenta.php">Mis Fotos</a></li>
            <li><a href="albumes.php">Mis Álbumes</a></li>
            <li><a href="miCuenta.php">Mi Cuenta</a></li>
            <li class="floatRight"><a href="fotoAlbum.php">Añadir foto a álbum</a></li>
            <li class="floatRight"><a href="subirImagen.php">Subir nueva imágen</a></li>
            <li class="floatRight"><a href="crearAlbum.php">Crear Álbum</a></li>
        </ul>
    </div>