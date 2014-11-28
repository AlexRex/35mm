<?php

$titBusq= $_GET["busq"];
$fechaBusq= $_GET["fecha"];
$paisBusq= $_GET["pais"];
$autorBusq= $_GET["autor"];
$camaraBusq= $_GET["camara"];

$title = "Resultado busqueda: ".$titBusq." / 35mm.com";




require_once('partials/header.inc');

require_once('database/database.php');

$db = new database();
$conectada = $db->connect();

$sentencia = 'SELECT * FROM fotos left outer join paises on fotos.Pais = paises.IdPais where Titulo like "%'.$titBusq.'%" and nomPais like "%'.$paisBusq.'%" and Fecha like "%'.$fechaBusq.'%"';


$resultado = $db->get($sentencia);



$db->close();

?>
<!--CONTENIDO-->
    <script type="text/javascript" src="../35mm/js/orden.js"></script>

    <div id="cuerpoResBusq">
        <h2>Resultado de la búsqueda: <?php echo $titBusq;
            if($fechaBusq) echo ' | '.$fechaBusq;
            if($paisBusq) echo ' | '.$paisBusq;
            if($autorBusq) echo ' | '.$autorBusq;
            if($camaraBusq) echo ' | '.$camaraBusq;

            ?> </h2>
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