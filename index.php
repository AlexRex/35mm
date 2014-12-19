<?php

require_once('database/database.php');
session_start();


$userLogged = false;

if(isset($_SESSION['usuarioSession']))
    $userLogged = true;


$db = new database();
$conectada = $db->connect();

$sentencia = 'SELECT * FROM fotos order by idFoto DESC limit 20';


$resultado = $db->get($sentencia);


$data = file_get_contents("data/fotosSel.json");
$reviews = json_decode($data, true);

$rand = rand(0,count($reviews)-1);


$foto = mysqli_fetch_assoc($db->getOne('IdFoto', 'fotos', $reviews[$rand]['IdFoto']));
$usuario = mysqli_fetch_assoc($db->getOne('IdUsuarios', 'usuarios', $foto['Usuario']));

$db->close();
$title = "Inicio / 35mm.com";

require_once('partials/header.inc');


?>
<!--CONTENIDO-->
    <div id="header" class="<?php echo $foto['Fichero'] ?>"><!-- Cabecera / registro --><!--De fondo una imagen-->

        <div class="seleccion">

            <h2><?php echo ('<a href="foto.php?id='.$foto['IdFoto'].'">'.$foto['Titulo'].'</a>') ?></h2>
            <span><?php echo $usuario['NomUsuario']  ?></span>
            <p><?php echo $reviews[$rand]['Critica']  ?></p>
            <em class="redactor">-<?php echo $reviews[$rand]['Autor']  ?></em>
        </div>
        <div class="contenedor">

            <?php if(!$userLogged){ ?>
            <form class='basicRegistr' method="post" action="registro.php">
                <input type="text" name="name" placeholder='Nombre de usuario'>
                <input type="email" name="email" placeholder='Email'>
                <input type="password" name="password" placeholder='Contraseña'>
                <input type="password" name="passRep" placeholder='Repite contraseña'>
                <input class="button" type="submit" value='Continuar con el registro'>

            <?php } ?></form>
        </div>
    </div>
    <div id="cuerpoInicio">
        <div class="carouselInicio">

            <ul id="am-container" class="am-container">
                <?php
                while($filas = mysqli_fetch_assoc($resultado)) {
                    echo('<div class="imageHolder"><a href="foto.php?id='.$filas['IdFoto'].'"><img class="miniatura" src="'.$filas['Fichero'].'" alt=""/><div class="caption"><h3>'.$filas['Titulo'].'</h3></div></a></div>');
                }
                ?>
            </ul>

        </div>
    </div>
    <script>
        var url = document.getElementById("header").className;
        document.getElementById("header").style.background = 'url('+url+') no-repeat center fixed';
        document.getElementById("header").style.backgroundSize = 'cover';
    </script>
<?php

require_once('partials/footer.inc');

?>