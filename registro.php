<?php

$title = "Inicio / 35mm.com";


$error = $_GET['error'];
$success = $_GET['success'];
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
                <?php
                    if($error) echo ('<p class="errorMsg">Nombre repetido</p>');
                    else if($success) echo ('<p class="successMsg">Registro completado con éxito</p>');
                ?>
            <form class='registroForm' action="crearUsuario.php" onsubmit="return(validate(this));" method="post">
                <input type="text" name="name" placeholder='Nombre de usuario'>
                <input type="email" name="email" placeholder='Email'>
                <input type="password" name="password" placeholder='Contraseña'>
                <input type="password" name="passRep" placeholder='Repite contraseña'>
                <select name="sexo" required>
                    <option value="0">Hombre</option>
                    <option value="1">Mujer</option>
                </select>
                <input type="text" name="fecha" placeholder="Fecha de Nacimiento: aaaa-mm-dd">
                <input type="text" name="ciudad" placeholder='Ciudad'>

                <select name="pais">
                    <?php

                    while($filas = mysqli_fetch_assoc($resultado)) {
                        echo('<option value="' . $filas["IdPais"] . '">' . $filas["NomPais"] . '</option>');
                    }
                    ?>
                </select>
                Foto <input type="file" name="foto">
                <input class="button" type="submit" value='Registrarse'>
            </form>
        </div>
    </div>

<?php

require_once('partials/footer.inc');

?>