<?php

$title = "Crear Nuevo Álbum / 35mm.com";

require_once('partials/header.inc');


?>
<!--CONTENIDO-->
    <div id="cuerpoNuevoAlbum">
        <div class="crearAlbum">
            <h2>Crear Album</h2>
            <form class='crearAlbumForm' action="formulario.php" method="get">
                <input type="text" name="titulo" placeholder='Título'>
                <input type="text" name="fecha" placeholder='Fecha'>
                <input type="text" name="descripcion" placeholder='Descripcion'>
                <input type="text" name="pais" placeholder='País'>
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