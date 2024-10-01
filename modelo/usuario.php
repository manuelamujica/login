<?php

class Usuario extends Conexion {
    private $conex;
    private $nombre;
    private $apellido;
    private $usuario;
    private $clave;
    private $correo;

    public function __construct(){
        $this->conex = new Conexion();
        $this->conex = $this->conex->conectar();
    
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    public function getUsuario(){
        return $this->usuario;
    }
    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }
    public function getClave(){
        return $this->clave;
    }
    public function setClave($clave){
        $this->clave = $clave;
    }
    public function getCorreo(){
        return $this->correo;
    }
    public function setCorreo($correo){
        $this->correo = $correo;
    }
    
    /*Verificar si el usuario que se esta ingresando coincide con alguno registrado en la BD*/
    public function login($user, $valor){

        $resultado = [];

        $sql = "SELECT * FROM usuarios WHERE $user = :$user";
        $stmt = $this->conex->prepare($sql);
        $stmt->bindParam(":".$user, $valor, PDO::PARAM_STR);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($resultado === false) {
        return [];
        }else{
            return $resultado;
        }
}

}