<?php

$title = "Inicio / 35mm.com";

require_once('partials/header.inc');


?>
<!--CONTENIDO-->
    <div id="cuerpoBusq">
        <div class="busqueda">
            <h2>Búsqueda avanzada</h2>
            <form class='busquedaForm' action="formulario.php" method="get">
                <input type="text" name="titulo" placeholder='Título'>
                <input type="text" name="fecha" placeholder='Fecha'>
                <input type="text" name="pais" placeholder='País'>
                <input type="text" name="autor" placeholder='Autor'>
                <input type="text" name="camara" placeholder='Cámara'>
                <input class="button" type="submit" value='Buscar'>
            </form>
        </div>
    </div>

<?php

require_once('partials/footer.inc');

?>