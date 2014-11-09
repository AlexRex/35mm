<?php

$title = "Inicio / 35mm.com";

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
                <p>10 / Octubre / 2014 <br> London, UK <br> Alex Rex</p>
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