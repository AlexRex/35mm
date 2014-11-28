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
    public function getAll($tabla){

        $sentencia = 'SELECT * FROM'.' '.$tabla;
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

} 