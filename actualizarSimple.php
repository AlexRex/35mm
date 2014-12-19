<?php

require_once('database/database.php');
require_once('partials/init.inc');
require_once('utils/imageResize.php');
require_once('utils/sanearString.php');

session_start();
$host  = $_SERVER['HTTP_HOST'];
if(!isset($_SESSION['usuarioSession'])){
    $extra = 'index.php';
    header("Location: http://$host$uri/$extra");
    exit;
}else{
    $userSess = $_SESSION['usuarioSession'];
    $email = $_POST['email'];
    $sexo = $_POST['sexo'];
    $FNacimiento = $_POST['fecha'];
    $Ciudad = $_POST['ciudad'];
    $idPais = $_POST['pais'];
    $Foto = '1';
}
$extra = "miCuenta.php?error=0";


$date = DateTime::createFromFormat('d/m/Y', $FNacimiento);
$fecha = date_format($date, 'Y-m-d');

$db = new database();
$db->connect();



$resultado = $db->updateUser($userSess['IdUsuarios'],$email,$sexo,$fecha,$Ciudad,$idPais,$Foto);

$path = $_FILES['fichero']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);

if($ext == 'jpg' || $ext=='png' || $ext=='jpeg'){


    $image = new SimpleImage();
    $image->load($_FILES["fichero"]["tmp_name"]);
    $image->resize(75,75);
    $image->save($_FILES["fichero"]["tmp_name"]);




    $directorio = "photosProfile/";
    $ruta = $directorio . $userSess['IdUsuarios']. '.png';


    if ($_FILES["fichero"]["error"] > 0) {
        echo "Error: " . $msgError[$_FILES["fichero"]["error"]] . "<br />";
        $extra = 'miCuenta.php?error=1';

    } else {

        if (is_dir($directorio)) {
            move_uploaded_file($_FILES["fichero"]["tmp_name"],
                $ruta);
        } else {
            mkdir($directorio);
            move_uploaded_file($_FILES["fichero"]["tmp_name"],
                $ruta);
        }

        $db->get("UPDATE usuarios SET Foto = '$ruta' where IdUsuarios=".$userSess['IdUsuarios']);
        $extra = "miCuenta.php?success=true";
    }

}
else{
    $extra = 'miCuenta.php?error=3';
}



$db->close();

header("Location: http://$host$uri/$extra");
exit;