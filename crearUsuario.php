<?php

require_once('database/database.php');
require_once('partials/init.inc');
require_once('utils/sanearString.php');
require_once('utils/imageResize.php');

$NomUsuario = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$repPassword = $_POST['passRep'];
$sexo = $_POST['sexo'];
$FNacimiento = $_POST['fecha'];
$Ciudad = $_POST['ciudad'];
$NomPais = $_POST['pais'];
$FotoTemp = '1';


$date = DateTime::createFromFormat('d/m/Y', $FNacimiento);
$fecha = date_format($date, 'Y-m-d');

$db = new database();
$db->connect();

$sent = "SELECT * FROM usuarios";


$users = $db->get($sent);

$exist = false;
while($row = mysqli_fetch_assoc($users)){
    if($row['NomUsuario'] == $NomUsuario) $exist = true;
}

if($exist==false){
    $resultado = $db->newUser($NomUsuario,$password,$email,$sexo,$FNacimiento,$Ciudad,$NomPais,$FotoTemp);

    //$extra = "registro.php?success=true";


    $path = $_FILES['fichero']['name'];
    $ext = pathinfo($path, PATHINFO_EXTENSION);


    if($ext == 'jpg' || $ext=='png' || $ext=='jpeg'){


        $image = new SimpleImage();
        $image->load($_FILES["fichero"]["tmp_name"]);
        $image->resize(100,100);
        $image->save($_FILES["fichero"]["tmp_name"]);


        $nombre = sanear_string($_FILES["fichero"]["name"]);


        $directorio = "photosProfile/";
        $ruta = $directorio . $resultado. '.'.$ext;

        if ($_FILES["fichero"]["error"] > 0) {
            echo "Error: " . $msgError[$_FILES["fichero"]["error"]] . "<br />";
            $extra = 'registro.php?error=5';

        } else {

            if (is_dir($directorio)) {
                move_uploaded_file($_FILES["fichero"]["tmp_name"],
                    $ruta);
            } else {
                mkdir($directorio);
                move_uploaded_file($_FILES["fichero"]["tmp_name"],
                    $ruta);
            }

            $db->get("UPDATE usuarios SET Foto = '$ruta' where IdUsuarios='$resultado'");
            $extra = "registro.php?succes=true";
        }

    }
    else{
        $extra = 'registro.php?error=3';
    }
}
else {
    $extra = "registro.php?error=nombre";

}
$db->close();

header("Location: http://$host$uri/$extra");
exit;