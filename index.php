<?php

$title = "Inicio / 35mm.com";

require_once('partials/header.inc');


?>
<!--CONTENIDO-->
    <div id="header"><!-- Cabecera / registro -->
        <div class="contenedor"><!--De fondo una imagen-->
            <form class='basicRegistr' onsubmit="return(validate(this));" method="post" action="oldHTML/registro.html">
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
            <a href="foto.php"><img src="img/img.png" alt=""></a>
            <a href="foto.php"><img src="img/img.png" alt=""></a>
            <a href="foto.php"><img src="img/img.png" alt=""></a>
            <a href="foto.php"><img src="img/img.png" alt=""></a>
            <a href="foto.php"><img src="img/img.png" alt=""></a>
            <a href="foto.php"><img src="img/img.png" alt=""></a>
            <a href="foto.php"><img src="img/img.png" alt=""></a>
            <a href="foto.php"><img src="img/img.png" alt=""></a>
            <a href="foto.php"><img src="img/img.png" alt=""></a>
            <a href="foto.php"><img src="img/img.png" alt=""></a>
            <a href="foto.php"><img src="img/img.png" alt=""></a>
            <a href="foto.php"><img src="img/img.png" alt=""></a>
            <a href="foto.php"><img src="img/img.png" alt=""></a>
            <a href="foto.php"><img src="img/img.png" alt=""></a>
            <a href="foto.php"><img src="img/img.png" alt=""></a>
            <a href="foto.php"><img src="img/img.png" alt=""></a>
            <a href="foto.php"><img src="img/img.png" alt=""></a>
            <a href="foto.php"><img src="img/img.png" alt=""></a>
            <a href="foto.php"><img src="img/img.png" alt=""></a>
            <a href="foto.php"><img src="img/img.png" alt=""></a>
            <a href="foto.php"><img src="img/img.png" alt=""></a>
            <a href="foto.php"><img src="img/img.png" alt=""></a>
            <a href="foto.php"><img src="img/img.png" alt=""></a>

        </div>
    </div>

<?php

require_once('partials/footer.inc');

?>