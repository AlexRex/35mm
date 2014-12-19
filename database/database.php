<?php

require_once('dbconfig.php');

class database {

    protected $mysqli;


    public function connect(){

        $connected = false;

        $this->mysqli = @new mysqli(
            dbServer,
            dbUser,
            dbPassword,
            dbDatabase
        );


        if(!($this->mysqli->connect_errno)){
            $connected = true;
        }
        return $connected;
    }

    //Obtener todos los resultados de la tabla $tabla
    public function getAll($tabla, $ordenar, $ordenTipo){

        $sentencia = 'SELECT * FROM '.$tabla.' order by '.$ordenar.' '.$ordenTipo;
        $resultado = $this->mysqli->query($sentencia);

        return $resultado;
    }

    public function getOne($col, $tabla, $cond){
        $sentencia = 'SELECT * FROM '.$tabla.' WHERE '.$col.' like "'.$cond.'"';
        //$sentencia = 'SELECT * FROM paises WHERE NomPais like "Englands"';
        $resultado = $this->mysqli->query($sentencia);

        return $resultado;
    }

    public function get($sentencia){
        //$sentencia = 'SELECT * FROM paises WHERE NomPais like "Englands"';
        $resultado = $this->mysqli->query($sentencia);

        return $resultado;
    }


    public function close(){
        return $this->mysqli->close();

    }

    public function newUser($NomUsuario, $password, $email, $sexo, $FNacimiento, $Ciudad, $Pais, $Foto){
        $sentencia = "INSERT INTO usuarios(NomUsuario, password, email, sexo, FNacimiento, Ciudad, Pais, Foto) VALUES ('$NomUsuario', MD5('$password'), '$email', '$sexo', '$FNacimiento', '$Ciudad', '$Pais', '$Foto')" ;
        $resultado = $this->mysqli->query($sentencia) or die(mysqli_error($this->mysqli));;

        return $this->mysqli->insert_id;
    }

    public function updateUser($idUsu, $email, $sexo, $FNacimiento, $Ciudad, $Pais, $Foto){
        $sentencia = "UPDATE usuarios SET email='$email', sexo='$sexo', FNacimiento='$FNacimiento', Ciudad='$Ciudad', Pais='$Pais', Foto='$Foto' where IdUsuarios='$idUsu'";
        $resultado = $this->mysqli->query($sentencia) or die(mysqli_error($this->mysqli));;

        return $resultado;
    }
    public function updatePass($idUsu, $pass){
        $sentencia = "UPDATE usuarios SET password = MD5('$pass') where IdUsuarios='$idUsu'";
        $resultado = $this->mysqli->query($sentencia) or die(mysqli_error($this->mysqli));;

        return $resultado;
    }
    public function deleteUser($idUsu){
        $sentencia = "DELETE from usuarios where IdUsuarios= ".$idUsu;
        $resultado = $this->mysqli->query($sentencia) or die(mysqli_error($this->mysqli));;

        return $resultado;
    }

    public function addAlbum($titulo, $descripcion, $fecha, $pais, $usuario){
        $sentencia = "INSERT INTO albumes(Titulo, Descripcion, Fecha, Pais, Usuario) VALUES ('$titulo', '$descripcion', '$fecha', '$pais', '$usuario')";
        $resultado = $this->mysqli->query($sentencia) or die(mysqli_error($this->mysqli));;

        return $resultado;
    }
    public function addImagen($titulo, $descripcion, $fecha, $pais, $album, $usuario, $fichero){
        if($album) $sentencia = "INSERT INTO fotos(Titulo, Descripcion, Fecha, Pais, Album, Usuario, Fichero) VALUES ('$titulo', '$descripcion', '$fecha', '$pais', '$album' ,'$usuario', '$fichero')";
        else $sentencia = "INSERT INTO fotos(Titulo, Descripcion, Fecha, Pais, Usuario, Fichero) VALUES ('$titulo', '$descripcion', '$fecha', '$pais' ,'$usuario', '$fichero')";
        $resultado = $this->mysqli->query($sentencia) or die(mysqli_error($this->mysqli));;
        return $this->mysqli->insert_id;
    }

    public function addFotoAlbum($foto, $album){
        $sentencia = "UPDATE fotos SET Album = '$album' where IdFoto= '$foto'";
        $resultado = $this->mysqli->query($sentencia) or die(mysqli_error($this->mysqli));

        return $resultado;
    }

    public function lastId(){
        return $this->mysqli->insert_id;
    }
}