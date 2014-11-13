<?php

$user1 = array('name'=>'luthor', 'password'=>'1234');
$user2 = array('name'=>'alex', 'password'=>'1234');

$name = $_POST["name"];
$password = $_POST["password"];

/* Redirecciona a una página diferente que se encuentra en el directorio actual */
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'index.php';

if(in_array($name, $user1)){
    if($user1['password'] == $password){
 //       echo "user found";
        $extra = 'cuenta.php';
    }
}
else if(in_array($name, $user2)){
    if($user2['password'] == $password){
   //     echo "user found";
        $extra = 'cuenta.php';
    }
}

header("Location: http://$host$uri/$extra");
exit;


?>