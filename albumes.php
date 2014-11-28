<?php


$title = "Mis Albumes / 35mm.com";


require_once('partials/header.inc');

require_once('database/database.php');

session_start();
$host  = $_SERVER['HTTP_HOST'];
$user = 'No user';
if(!isset($_SESSION['usuarioSession'])){
    $extra = 'index.php';
    header("Location: http://$host$uri/$extra");
    exit;
}
else{
    $user = $_SESSION['usuarioSession'];
}


$db = new database();
$conectada = $db->connect();

$sentencia = 'SELECT * FROM albumes WHERE albumes.Usuario = '.$user['IdUsuarios'];


$resultado = $db->get($sentencia);



$db->close();

?>
<!--CONTENIDO-->

    <div id="cuerpoResBusq">
        <div class="carouselResultado" >
            <ul id="listaResultado">
                <?php
                    while($filas = mysqli_fetch_assoc($resultado)) {
                        echo('<li><a href="album.php?id='.$filas['IdAlbum'].'"><img src="img/img.png" alt=""/></a><h3>'.$filas["Titulo"].'</h3><div>'.$filas['Descripcion'].'</div><div>'.$filas['Fecha'].'</div></li>');
                    }
                ?>
            </ul>
        </div>
    </div>

<?php

require_once('partials/footer.inc');

?>