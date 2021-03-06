<?php

$title = "Crear Nuevo Álbum / 35mm.com";

require_once('database/database.php');

$db = new database();
$conectada = $db->connect();

$resultado = $db->getAll('paises', 'NomPais', 'ASC');

$error = $_GET['error'];
$success = $_GET['success'];

$db->close();

require_once('partials/headerCuenta.inc');

?>
<!--CONTENIDO-->
    <div id="cuerpoNuevoAlbum">
        <div class="crearAlbum">
            <h2>Crear Album</h2>
            <?php
                if($error) echo ('<p class="errorMsg">Debes introducir un título</p>');
                else if($success) echo ('<p class="successMsg">Creado con éxito</p>');
            ?>
            <form class='crearAlbumForm' action="nuevoAlbum.php" method="post">
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