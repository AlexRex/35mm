<?php

require_once('partials/init.inc');
require_once('database/database.php');

$idFoto= $_GET["id"];


session_start();
$host  = $_SERVER['HTTP_HOST'];
if(!isset($_SESSION['usuarioSession'])){
    $extra = 'index.php';
    header("Location: http://$host$uri/$extra");
    exit;
}

$db = new database();
$conectada = $db->connect();

$sentencia = 'SELECT * from fotos left outer join paises on fotos.Pais = paises.IdPais left outer join usuarios on fotos.Usuario = usuarios.IdUsuarios where fotos.IdFoto = '.$idFoto;


$resultado = $db->get($sentencia);

$foto = mysqli_fetch_assoc($resultado);


$db->close();

$title = $foto['Titulo']." / 35mm.com";

require_once('partials/header.inc');
?>
<!--CONTENIDO-->
    <div id="cuerpoFoto">
        <div class="detalleFoto">
            <div class="foto">
                <img src="img/foto.png" alt="">
                <h2><?php echo($foto['Titulo']) ?></h2>
                <p><?php echo($foto['Descripcion']) ?></p>
            </div>
            <div class="datosFoto">
                <p><?php echo($foto['Fecha']) ?><br> <?php echo($foto['NomPais']) ?> <br><?php echo($foto['NomUsuario']) ?> </p>
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