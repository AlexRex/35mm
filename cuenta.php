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

        <div class="fotosPerfil" >

            <ul id="listaResultado">
                <?php

                while($filas = mysqli_fetch_assoc($resultado)) {
                    echo('<li><a href="foto.php?id='.$filas['IdFoto'].'"><img src="img/img.png" alt=""/></a><h3>'.$filas["Titulo"].'</h3><div>'.$filas['NomPais'].'</div><div>'.$filas['Fecha'].'</div><div></div></li>');
                }
                ?>
            </ul>
        </div>
    </div>

<?php

require_once('partials/footer.inc');

?>