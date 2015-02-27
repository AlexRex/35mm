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

$error = $_GET['error'];
$success = $_GET['success'];

$db = new database();
$conectada = $db->connect();

$sentAlbumes = 'SELECT * from albumes where Usuario= '.$user['IdUsuarios'];

$albumes = $db->get($sentAlbumes);


$db->close();


require_once('partials/headerCuenta.inc');

?>
    <!--CONTENIDO-->
    <div id="cuerpoNuevoAlbum">
        <div class="crearAlbum">
            <h2>Descargar Álbum</h2>
            <?php
            if($error) echo ('<p class="errorMsg">Contraseña incorrecta</p>');
            else if($success) echo ('<p class="successMsg">Añadida con éxito</p>');
            ?>
            <form class='crearAlbumForm' action="descargarPDF.php" method="get">
                <label for="id">Álbum</label>
                <select name="id">
                    <?php

                    while($filas = mysqli_fetch_assoc($albumes)) {
                        echo('<option value="' . $filas["IdAlbum"] . '">' . $filas["Titulo"] . '</option>');
                    }
                    ?>
                </select>
                <input class="button" type="submit" value='Descargar'>
            </form>
        </div>

    </div>

<?php

require_once('partials/footer.inc');

?>