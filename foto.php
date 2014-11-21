<?php

require_once('partials/init.inc');

$title = "Foto: Titulo / 35mm.com";
$idFoto= $_GET["id"];


session_start();
$host  = $_SERVER['HTTP_HOST'];
if(isset($_SESSION['usuarioSession'])){
}
else{
    $extra = 'index.php';
    header("Location: http://$host$uri/$extra");
    exit;
}

require_once('partials/header.inc');


?>
<!--CONTENIDO-->
    <div id="cuerpoFoto">
        <div class="detalleFoto">
            <div class="foto">
                <img src="img/foto.png" alt="">
                <h2>Título de la foto</h2>
            </div>
            <div class="datosFoto">
                <p>10 / Octubre / 2014 <br> London, UK <br> Alex Rex <br/> ID: <?php echo $idFoto ?> </p>
            </div>
            <div class="albumes">
                <h4>Álbumes: </h4>
                <ul>
                    <li><a href="#">Álbum1</a></li>
                    <li><a href="#">Álbum2</a></li>
                    <li><a href="#">Álbum3</a></li>
                </ul>
            </div>
            <div class="comentarios">
                <h4>Comentarios</h4>
                <ul>
                    <li>
                        <h5>Alex:</h5>
                        <p>Más mola.</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>

<?php

require_once('partials/footer.inc');

?>