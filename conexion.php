<style>

    .container{

        height: 100%;
        background-image: linear-gradient(to left bottom, #8835e3, #0050c7, #004688, #003145, #121818);        
        }
</style>

<?php

class conexion{

    
 private $servidor = "localhost";
 private $usuario = "root";
 private $contrasenia = "";
 private $conexion;
 
public function __construct(){
    

    try {

        $this->conexion=new PDO("mysql:host=$this->servidor;dbname=practica",$this->usuario,$this->contrasenia);
        
        $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {

        return "falla en el comando".$e;
    }

}


public function ejectutar($sql){

    $this->conexion->exec($sql);
    return $this->conexion->lastInsertId();



}

public function consultar($sql){

    $sentencia = $this->conexion->prepare($sql);
    $sentencia->execute();
    return $sentencia->fetchAll();


}


}


?>