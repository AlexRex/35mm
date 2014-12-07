<?php

$title = "Subir nueva imagen / 35mm.com";

require_once('database/database.php');

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
$conectada = $db->connect();

$resultado = $db->getAll('paises', 'NomPais', 'ASC');

$error = $_GET['error'];
$success = $_GET['success'];

$sentencia = "select * from albumes where Usuario = ". $user['IdUsuarios'];
$albumes = $db->get($sentencia);


$db->close();
require_once('partials/headerCuenta.inc');

?>
    <!--CONTENIDO-->
    <div id="cuerpoNuevoAlbum">
        <div class="crearAlbum">
            <h2>Subir imagen</h2>
            <?php
            if($error) echo ('<p class="errorMsg">Debes introducir un título</p>');
            else if($success) echo ('<p class="successMsg">Creado con éxito</p>');
            ?>
            <form class='crearAlbumForm' action="nuevaImagen.php" method="post">
                <input type="text" name="titulo" placeholder='Título'>
                <input type="text" name="fecha" placeholder='Fecha'>
                <input type="text" name="descripcion" placeholder='Descripcion'>
                <select name="pais">
                    
                    <?php

                    while($filas = mysqli_fetch_assoc($resultado)) {
                        echo('<option value="' . $filas["IdPais"] . '">' . $filas["NomPais"] . '</option>');
                    }
                    ?>
                </select>
                <select name="album">
                    <option value=""></option>
                    <?php

                    while($filas = mysqli_fetch_assoc($albumes)) {
                       echo('<option value="' . $filas["IdAlbum"] . '">' . $filas["Titulo"] . '</option>');

                    }
                    ?>
                </select>
                <input class="button" type="submit" value='Crear'>
            </form>
        </div>

        <div class="subirFotos">
            <h1 class="dentroSubir">Arrastra aquí las fotos</h1>
        </div>
    </div>

<?php

require_once('partials/footer.inc');

?>