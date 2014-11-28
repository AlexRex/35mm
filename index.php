<?php

require_once('database/database.php');

$db = new database();
$conectada = $db->connect();

$sentencia = 'SELECT * FROM fotos order by idFoto DESC limit 24';


$resultado = $db->get($sentencia);



$db->close();




$title = "Inicio / 35mm.com";

require_once('partials/header.inc');


?>
<!--CONTENIDO-->
    <div id="header"><!-- Cabecera / registro -->
        <div class="contenedor"><!--De fondo una imagen-->
            <form class='basicRegistr' method="post" action="registro.php">
                <input type="text" name="name" placeholder='Nombre de usuario'>
                <input type="email" name="email" placeholder='Email'>
                <input type="password" name="password" placeholder='Contraseña'>
                <input type="password" name="passRep" placeholder='Repite contraseña'>
                <input class="button" type="submit" value='Continuar con el registro'>

            </form>
        </div>
    </div>
    <div id="cuerpoInicio">
        <div class="carouselInicio">

            <ul id="listaResultado">

                <?php


                while($filas = mysqli_fetch_assoc($resultado)) {
                    echo('<a href="foto.php?id='.$filas['IdFoto'].'"><img src="img/img.png" alt=""/></a>');
                }
                ?>
            </ul>

        </div>
    </div>

<?php

require_once('partials/footer.inc');

?>