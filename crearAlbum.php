<?php

$title = "Crear Nuevo Álbum / 35mm.com";

require_once('partials/header.inc');
require_once('database/database.php');

$db = new database();
$conectada = $db->connect();

$resultado = $db->getAll('paises', 'NomPais', 'ASC');



$db->close();

?>
<!--CONTENIDO-->
    <div id="cuerpoNuevoAlbum">
        <div class="crearAlbum">
            <h2>Crear Album</h2>
            <form class='crearAlbumForm' action="formulario.php" method="get">
                <input type="text" name="titulo" placeholder='Título'>
                <input type="text" name="fecha" placeholder='Fecha'>
                <input type="text" name="descripcion" placeholder='Descripcion'>
                <select name="pais">
                    <option value=""></option>
                    <?php

                    while($filas = mysqli_fetch_assoc($resultado)) {
                        echo('<option value="' . $filas["NomPais"] . '">' . $filas["NomPais"] . '</option>');
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