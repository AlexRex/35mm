<?php

require_once('database/database.php');
require_once('partials/init.inc');

$NomUsuario = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$repPassword = $_POST['passRep'];
$sexo = $_POST['sexo'];
$FNacimiento = $_POST['fecha'];
$Ciudad = $_POST['ciudad'];
$NomPais = $_POST['pais'];
$Foto = '1';


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
    $resultado = $db->newUser($NomUsuario,$password, $email,$sexo,$FNacimiento,$Ciudad,$NomPais,$Foto);
    $extra = "registro.php?success=true";
}
else {
    $extra = "registro.php?error=nombre";

}
$db->close();

header("Location: http://$host$uri/$extra");
exit;