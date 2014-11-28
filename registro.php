<?php

$title = "Inicio / 35mm.com";


require_once('partials/header.inc');
require_once('database/database.php');


$db = new database();
$conectada = $db->connect();

$resultado = $db->getAll('paises', 'NomPais', 'ASC');



$db->close();

?>
<!--CONTENIDO-->
    <div id="cuerpoReg"><br>
        <div class="registro">
            <form class='registroForm' action="formulario.php" onsubmit="return(validate(this));" method="post">
                <input type="text" name="name" placeholder='Nombre de usuario'>
                <input type="email" name="email" placeholder='Email'>
                <input type="password" name="password" placeholder='Contraseña'>
                <input type="password" name="passRep" placeholder='Repite contraseña'>
                <select name="sexo" required>
                    <option value="hombre">Hombre</option>
                    <option value="mujer">Mujer</option>
                </select>
                <input type="text" name="fecha" placeholder="Fecha de Nacimiento">                <input type="text" name="ciudad" placeholder='Ciudad'>

                <select name="pais">
                    <option value=""></option>
                    <?php

                    while($filas = mysqli_fetch_assoc($resultado)) {
                        echo('<option value="' . $filas["NomPais"] . '">' . $filas["NomPais"] . '</option>');
                    }
                    ?>
                </select>
                <input type="text" name="pais" placeholder='País'>
                Foto <input type="file">
                <input class="button" type="submit" value='Registrarse'>
            </form>
        </div>
    </div>

<?php

require_once('partials/footer.inc');

?>