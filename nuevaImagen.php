<?php

require_once('database/database.php');
require_once('partials/init.inc');
require_once('utils/sanearString.php');
require_once('utils/imageResize.php');
$extra = 'subirImagen.php?error=0';


session_start();
$host  = $_SERVER['HTTP_HOST'];
if(!isset($_SESSION['usuarioSession'])){
    $extra = 'index.php';
    header("Location: http://$host$uri/$extra");
    exit;
}else{
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];
    $pais = $_POST['pais'];
    $album = $_POST['album'];
    $userSess = $_SESSION['usuarioSession'];
}


if($titulo==''){
    $extra = 'subirImagen.php?error=1';
    header("Location: http://$host$uri/$extra");
    exit;
}


if($fecha){

    $date = DateTime::createFromFormat('d/m/Y', $fecha);
    $fecha = date_format($date, 'Y-m-d');

}

else{
    $fecha = date('Y-m-d');
}

$db = new database();
$db->connect();

$consultaUltimaFoto = "SELECT MAX(IdFoto) from fotos";

$ultimaFoto = mysqli_fetch_assoc($db->get($consultaUltimaFoto))['MAX(IdFoto)']+1;


$msgError = array(0 => "No hay error, el fichero se subió con éxito",
    1 => "El tamaño del fichero supera la directiva
                          upload_max_filesize el php.ini",
    2 => "El tamaño del fichero supera la directiva
                          MAX_FILE_SIZE especificada en el formulario HTML",
    3 => "El fichero fue parcialmente subido",
    4 => "No se ha subido un fichero",
    6 => "No existe un directorio temporal",
    7 => "Fallo al escribir el fichero al disco",
    8 => "La subida del fichero fue detenida por la extensión");


//Saneamos nombre de imagen. sin espacios ni acentos, enyes.. etcetc.

$path = $_FILES['fichero']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);


if($ext == 'jpg' || $ext=='png' || $ext=='jpeg'){


    $image = new SimpleImage();
    $image->load($_FILES["fichero"]["tmp_name"]);
    $image->resizeToWidth(1500);
    $image->save($_FILES["fichero"]["tmp_name"]);


    $nombre = sanear_string($_FILES["fichero"]["name"]);


    $directorio = "photos/" . $userSess['IdUsuarios'] . "/";
    $ruta = $directorio . $ultimaFoto . $nombre;

    if ($_FILES["fichero"]["error"] > 0) {
        echo "Error: " . $msgError[$_FILES["fichero"]["error"]] . "<br />";
        $extra = 'subirImagen.php?error=5';

    } else {

        if (is_dir($directorio)) {
            move_uploaded_file($_FILES["fichero"]["tmp_name"],
                    $ruta);
        } else {
            mkdir($directorio);
            move_uploaded_file($_FILES["fichero"]["tmp_name"],
                $ruta);
        }
        $resultado = $db->addImagen($titulo, $descripcion, $fecha, $pais, $album, $userSess['IdUsuarios'], $ruta);
        $extra = 'foto.php?id=' . $resultado;
    }
//photos/IdUsuario/IdFotoNOMBREFOTO.EXTENSION

}
else{
    $extra = 'subirImagen.php?error=3';
}

$db->close();
header("Location: http://$host$uri/$extra");
exit;

