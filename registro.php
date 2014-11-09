<?php

$title = "Inicio / 35mm.com";

require_once('partials/header.inc');


?>
<!--CONTENIDO-->
    <div id="cuerpoReg"><br>
        <div class="registro">
            <form class='registroForm' action="#" onsubmit="return(validate(this));" method="post">
                <input type="text" name="name" placeholder='Nombre de usuario'>
                <input type="email" name="email" placeholder='Email'>
                <input type="password" name="password" placeholder='Contraseña'>
                <input type="password" name="passRep" placeholder='Repite contraseña'>
                <select name="Sexo" required>
                    <option value="hombre">Hombre</option>
                    <option value="mujer">Mujer</option>
                </select>
                <input type="text" name="fecha"> Fecha de nacimiento
                <input type="text" name="ciudad" placeholder='Ciudad'>
                <input type="text" name="pais" placeholder='País'>
                Foto <input type="file">
                <input class="button" type="submit" value='Registrarse'>
            </form>
        </div>
    </div>

<?php

require_once('partials/footer.inc');

?>