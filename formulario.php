
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>

    <link rel="stylesheet" type="text/css" href="../35mm/css/styleAlt.css" media="screen" title="Principal">
    <link rel="alternate stylesheet" type="text/css" href="../35mm/css/style.css" media="screen" title="Alternativo">
    <link rel="alternate stylesheet" type="text/css" href="../35mm/css/access.css" media="screen" title="Accesible">
    <link rel="stylesheet" type="text/css" href="../35mm/css/print.css" media="print">
    <link rel="icon" href="../35mm/img/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon"/>


</head>
<body>
<pre>
<?php
echo "Contenido de \$_GET:\n";
print_r($_GET);
echo "\n";
echo "Contenido de \$_POST:\n";
print_r($_POST);
echo "\n";
echo "Contenido de \$_REQUEST:\n";
print_r($_REQUEST);
?>
</pre>
<p>
    Nombre: <b><?php echo $_POST["name"];?></b>
    <br />
    Email: <b><?php echo $_POST["email"];?></b>
    <br />
    Password: <b><?php echo $_POST["password"];?></b>
    <br />
    Repeticion Password: <b><?php echo $_POST["passRep"];?></b>
    <br />
    Sexo: <b><?php echo $_POST["sexo"];?></b>
    <br />
    fecha: <b><?php echo $_POST["fecha"];?></b>
    <br />
    ciudad: <b><?php echo $_POST["ciudad"];?></b>
    <br />
    pais: <b><?php echo $_POST["pais"];?></b>
</p>
</body>
</html>