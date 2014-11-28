<?php
require_once('partials/init.inc');

session_start();
$host  = $_SERVER['HTTP_HOST'];
if(!isset($_SESSION['usuarioSession'])){
    $extra = 'index.php';
    header("Location: http://$host$uri/$extra");
    exit;
}else{
    $user = $_SESSION['usuarioSession'];
}

$title = $user['NomUsuario']." / 35mm.com";


require_once('database/database.php');

$db = new database();
$conectada = $db->connect();

$sentencia = 'SELECT * FROM fotos left outer join paises on fotos.Pais = paises.IdPais where Usuario = '.$user['IdUsuarios'].' order by IdFoto DESC limit 15';


$resultado = $db->get($sentencia);



$db->close();



require_once('partials/header.inc');



?>
<!--CONTENIDO-->
    <div id="cuerpoCuenta">
        <div class="headerUsuario">
            <div class="descUsuario">

                <div class="imgUser"><img src="http://cdn.bavotasan.com/wp-content/uploads/2011/02/desktop.jpg" alt=""/></div>
                <h2>Alex Torres</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                    nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cil.</p>
            </div>
        </div>
        <div class="navUsuario">
            <ul class="listNavUsuario">
                <li><a href="#">Mis Fotos</a></li>
                <li><a href="albumes.php">Mis Álbumes</a></li>
                <li><a href="#">Mi Cuenta</a></li>
                <li class="floatRight"><a href="fotoAlbum.php">Añadir foto a álbum</a></li>
                <li class="floatRight"><a href="#">Subir nueva imágen</a></li>
                <li class="floatRight"><a href="crearAlbum.php">Crear Álbum</a></li>
            </ul>
        </div>

        <div class="fotosPerfil" >

            <ul id="listaResultado">
                <?php

                while($filas = mysqli_fetch_assoc($resultado)) {
                    echo('<li><a href="foto.php?id='.$filas['IdFoto'].'"><img src="img/img.png" alt=""/></a><h3>'.$filas["Titulo"].'</h3><div>'.$filas['NomPais'].'</div><div>'.$filas['Fecha'].'</div><div></div></li>');
                }
                ?>
            </ul>
        </div>
    </div>

<?php

require_once('partials/footer.inc');

?>