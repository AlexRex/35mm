<?php
require_once('partials/init.inc');

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


require_once('database/database.php');

$db = new database();
$conectada = $db->connect();

$sentencia = 'SELECT * FROM fotos left outer join paises on fotos.Pais = paises.IdPais where Usuario = '.$user['IdUsuarios'].' order by IdFoto DESC limit 15';


$resultado = $db->get($sentencia);





$db->close();
require_once('partials/headerCuenta.inc');
?>
    <script src="js/"></script>
        <div class="fotosPerfil" >

            <div id="am-container" class="am-container">
                <?php

                while($filas = mysqli_fetch_assoc($resultado)) {
                    echo('<div class="imageHolder"><a href="foto.php?id='.$filas['IdFoto'].'"><img class="miniatura" src="'.$filas['Fichero'].'" alt=""/><div class="caption"><h3>'.$filas['Titulo'].'</h3></div></a></div>');
                }
                ?>
            </div>
        </div>
    </div>


<?php

require_once('partials/footer.inc');

?>