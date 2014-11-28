<?php

$albumID= $_GET["id"];



require_once('database/database.php');

$db = new database();
$conectada = $db->connect();

$sentencia = 'SELECT * FROM fotos left outer join paises on fotos.Pais = paises.IdPais where fotos.Album = '.$albumID;
$sentencia2 = 'Select * from albumes where albumes.IdAlbum = '.$albumID;

$resultado = $db->get($sentencia);
$resultadoAlbum = $db->get($sentencia2);

$album = mysqli_fetch_assoc($resultadoAlbum);

$db->close();

$title = $album['Titulo']." / 35mm.com";
require_once('partials/header.inc');

?>
<!--CONTENIDO-->
    <script type="text/javascript" src="../35mm/js/orden.js"></script>

    <div id="cuerpoResBusq">
        <h2><?php echo($album['Titulo']) ?> </h2>
        <h4>Ordenar:</h4>
        <div class="ordenes">
            <span class="ordenNombre">Nombre</span > <input type="button" id="ordenNombre" value="Ascendente">
            <span class="ordenNombre">País</span> <input type="button" id="ordenPais" value="Ascendente">
            <span class="ordenNombre">Fecha</span> <input type="button" id="ordenFecha" value="Ascendente">

        </div>
        <div class="carouselResultado" >

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