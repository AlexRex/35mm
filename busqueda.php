<?php

$title = "Búsqueda Avanzada / 35mm.com";

require_once('partials/header.inc');
require_once('database/database.php');

$db = new database();
$conectada = $db->connect();

$resultado = $db->getAll('paises');



$db->close();

?>
<!--CONTENIDO-->
    <div id="cuerpoBusq">
        <div class="busqueda">
            <h2>Búsqueda avanzada</h2>
            <form class='busquedaForm' action="resbusq.php" method="get">
                <input type="text" name="busq" placeholder='Título'>
                <input type="text" name="fecha" placeholder='Fecha'>
                <select name="pais">
                    <option value=""></option>
                    <?php

                    while($filas = mysqli_fetch_assoc($resultado)) {
                        echo('<option value="' . $filas["NomPais"] . '">' . $filas["NomPais"] . '</option>');
                    }
                    ?>
                </select>
                <input type="text" name="autor" placeholder='Autor'>
                <input type="text" name="camara" placeholder='Cámara'>
                <input class="button" type="submit" value='Buscar'>
            </form>
        </div>
    </div>

<?php

require_once('partials/footer.inc');

?>