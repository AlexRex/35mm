<?php

$title = "Añadir foto a álbum / 35mm.com";

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

$sentAlbumes = 'SELECT * from albumes where Usuario= '.$user['IdUsuarios'];

$sentFotos = 'SELECT * from fotos where Usuario= '.$user['IdUsuarios'];
$fotos = $db->get($sentFotos);
$albumes = $db->get($sentAlbumes);


$db->close();


require_once('partials/header.inc');

?>
<!--CONTENIDO-->
    <div id="cuerpoNuevoAlbum">
        <div class="crearAlbum">
            <h2>Crear Album</h2>
            <form class='crearAlbumForm' action="formulario.php" method="get">
                <label for="foto">Foto</label>
                <select name="foto">
                    <?php

                    while($filas = mysqli_fetch_assoc($fotos)) {
                        echo('<option value="' . $filas["Titulo"] . '">' . $filas["Titulo"] . '</option>');
                    }
                    ?>
                </select>
                <label for="album">Álbum</label>
                <select name="album">
                    <?php

                    while($filas = mysqli_fetch_assoc($albumes)) {
                        echo('<option value="' . $filas["Titulo"] . '">' . $filas["Titulo"] . '</option>');
                    }
                    ?>
                </select>
                <input class="button" type="submit" value='Añadir'>
            </form>
        </div>

    </div>

<?php

require_once('partials/footer.inc');

?>