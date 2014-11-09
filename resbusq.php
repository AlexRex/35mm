<?php

$title = "Inicio / 35mm.com";

require_once('partials/header.inc');


?>
<!--CONTENIDO-->
    <script type="text/javascript" src="../35mm/js/orden.js"></script>

    <div id="cuerpoResBusq">
        <h2>Resultado de la búsqueda: AAAA</h2>
        <h4>Ordenar:</h4>
        <div class="ordenes">
            <span class="ordenNombre">Nombre</span > <input type="button" id="ordenNombre" value="Ascendente">
            <span class="ordenNombre">País</span> <input type="button" id="ordenPais" value="Ascendente">
            <span class="ordenNombre">Fecha</span> <input type="button" id="ordenFecha" value="Ascendente">

        </div>
        <div class="carouselResultado" >
            <ul id="listaResultado">
                <li><a href="foto.php"><img src="img/img.png" alt=""></a>
                    <h3>Casa</h3>
                    <div>Spain</div>
                    <div>24 / 05 / 1998</div>
                    <div>Autor</div>
                </li>
                <li><a href="foto.php"><img src="img/img.png" alt=""></a>
                    <h3>Zimbaue</h3>
                    <div>Zimbaue</div>
                    <div>14 / 02 / 2012</div>
                    <div>Autor</div>
                </li>
                <li><a href="foto.php"><img src="img/img.png" alt=""></a>
                    <h3>Pekin</h3>
                    <div>Inglaterra</div>
                    <div>03 / 10 / 2002</div>
                    <div>Autor</div>
                </li>
                <li><a href="foto.php"><img src="img/img.png" alt=""></a>
                    <h3>Roma</h3>
                    <div>Alemania</div>
                    <div>04 / 11 / 2002</div>
                    <div>Autor</div>
                </li>
            </ul>
        </div>
    </div>

<?php

require_once('partials/footer.inc');

?>