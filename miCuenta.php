<?php
require_once('partials/init.inc');
require_once('database/database.php');

session_start();
$host  = $_SERVER['HTTP_HOST'];
if(!isset($_SESSION['usuarioSession'])){
    $extra = 'index.php';
    header("Location: http://$host$uri/$extra");
    exit;
}else{
    $user = $_SESSION['usuarioSession'];
}

$title = $user['NomUsuario']." / 35mm.com";



$error = $_GET['error'];
$success = $_GET['success'];

$db = new database();
$conectada = $db->connect();

$sentencia = "SELECT * FROM usuarios where IdUsuarios = ".$user['IdUsuarios'];


$resultado = $db->get($sentencia);
$datosUser = mysqli_fetch_assoc($resultado);

$resultado = $db->getAll('paises', 'NomPais', 'ASC');

$db->close();


require_once('partials/headerCuenta.inc');




?>


        <div class="actualizarDatos">
            <?php
            if($error) echo ('<p class="errorMsg">Contraseña incorrecta</p>');
            else if($success) echo ('<p class="successMsg">Actualizado con éxito</p>');
            ?>
            <form class="actualizarForm" action="actualizarSimple.php" method="post">
                <input type="text" name="email" value="<?php if($datosUser['email']) echo $datosUser['email']; else echo " "?>" placeholder=<?php echo $datosUser['email']?>>
                <input type="text" name="ciudad" value="<?php echo $datosUser['Ciudad']?>" placeholder=<?php echo $datosUser['Ciudad']?>>
                <select name="pais">
                    <?php

                    while($filas = mysqli_fetch_assoc($resultado)) {
                        if($datosUser['Pais'] == $filas["IdPais"]) echo('<option value="' . $filas["IdPais"] . '" selected="selected">' . $filas["NomPais"] . '</option>');
                        else echo('<option value="' . $filas["IdPais"] . '">' . $filas["NomPais"] . '</option>');
                    }
                    ?>
                </select>
                <input type="text" name="fecha" value="<?php echo $datosUser['FNacimiento']?>" placeholder=<?php echo $datosUser['FNacimiento']?>>
                <select name="sexo" required>
                    <?php
                    switch($user['sexo']){
                        case 0:
                            echo ('<option value="2">-</option>
                    <option value="0" selected="selected">Hombre</option>
                    <option value="1">Mujer</option>');
                            break;

                        case 1:
                            echo ('<option value="2">-</option>
                                    <option value="0">Hombre</option>
                                    <option value="1" selected="selected">Mujer</option>');
                            break;

                        case 2:
                            echo ('<option value="2" selected="selected">-</option>
                    <option value="0">Hombre</option>
                    <option value="1">Mujer</option>');
                            break;
                    }
                    ?>
                </select><br/>
                <label for="foto">Foto de perfil</label>
                <input type="file" name="foto"/>
                <input class="button" type="submit" value='Actualizar'>

            </form>
            <br/><br/>

        </div>
        <div class="actualizarDatos">
            <form class="actualizarForm" action="actualizarPass.php" method="post">
                <input type="password" name="password" placeholder='Contraseña'>
                <input type="password" name="passRep" placeholder='Repite contraseña'>
                <input class="button" type="submit" value='Actualizar contraseña'></form>
        </div>
        <div class="actualizarDatos">
            <div class="eliminarCuentaForm actualizarForm">
                <button class="eliminar" onclick="function eliminarCuenta() {
                    window.scrollTo(0, 0);
                    var ventConf = document.getElementById('confirmarEliminar');
                    ventConf.className = '';
            }
            eliminarCuenta();"> Eliminar cuenta</button>
            </div>
        </div>
    </div>

<?php

require_once('partials/footer.inc');

?>


    <div id="confirmarEliminar" class="hidden">
        <div class="formEliminar">
            Estás seguro que quieres eliminar la cuenta?
            <form class="eliminarCuenta" action="eliminarCuenta.php" method="post">
                <input type="password" name="password" placeholder="Introduce la contraseña"/>
                <Button type="submit" class="eliminar"  value="Eliminar">Eliminar
            </form>
            <button class="cancelar" onclick="function cancelar() {
                    window.scrollTo(0, 300);
                    var ventConf = document.getElementById('confirmarEliminar');
                    ventConf.className = 'hidden';
            }
            cancelar();">Cancelar</button>
        </div>
    </div>

