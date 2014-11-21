<?php

require_once('partials/init.inc');

session_start();

$user1 = array('name'=>'luthor', 'password'=>'1234');
$user2 = array('name'=>'alex', 'password'=>'1234');

$name = $_POST["name"];
$password = $_POST["password"];

$recordar = $_POST["recordar"];

$extra = 'index.php';

if(in_array($name, $user1)){
    if($user1['password'] == $password){
 //       echo "user found";
        if($recordar) setcookie('usuarioRecordar', $name, time() + 365*24*60*60);
        $_SESSION['usuarioSession'] = $user1;
        $extra = 'cuenta.php';
    }
}
else if(in_array($name, $user2)){
    if($user2['password'] == $password){
       // echo "user found";
        if($recordar) setcookie('usuarioRecordar', $name, time() + 365*24*60*60);
        $_SESSION['usuarioSession'] = $user2;
        $extra = 'cuenta.php';
    }
}

//setcookie('usuario', [$name, $password], time() + 365*24*60*60);


header("Location: http://$host$uri/$extra");
exit;


?>