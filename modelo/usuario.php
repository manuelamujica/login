<?php
require_once 'conexion.php';

class Usuario extends Conexion {
    private $conex;
    private $nombre;
    private $apellido;
    private $usuario;
    private $clave;
    private $correo;
    private $perfil;

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
    public function getPerfil(){
        return $this->perfil;
    }
    public function setPerfil($perfil){
        $this->nombre=$perfil;
    }

    #Mostrar los perfiles (accesos) previamente guardados en BD. Para el reigstro de un nuevo usuario
    public function perfiles(){

        $sql = "SELECT * FROM perfiles";
        $stmt = $this->conex->prepare($sql);
        $resul = $stmt->execute();

        $fetch = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($resul){
            return $fetch;
        } else {
            return [];
        }
    }

    /*LOGIN: Verificar si el usuario que se esta ingresando coincide con alguno registrado en la BD*/
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

#Para registrar un nuevo usuario desde la vista registrar usuario
    public function registrar($perfil){
        $sql= "INSERT usuarios(nombre,apellido,user,clave,correo,cod_perfil) VALUES(:nombre,:apellido,:user,:clave,:correo,:cod_perfil)";
        $strExec = $this->conex->prepare($sql);

        $strExec->bindParam(':nombre',$this->nombre);
        $strExec->bindParam(':apellido',$this->apellido);
        $strExec->bindParam(':user',$this->usuario);
        $strExec->bindParam(':clave',$this->clave);
        $strExec->bindParam(':correo',$this->correo);
        $strExec->bindParam(':cod_perfil',$perfil);

        $resul = $strExec->execute();
        if($resul){
            $r = 1;
        } else{
            $r=0;
        }

    }

    #ACCESOS. 
    public function accesos($valor){
        $datos = [];
        $sql= "SELECT p.cod_perfil FROM usuarios u
            INNER JOIN perfiles p ON u.cod_perfil = p.cod_perfil
            WHERE u.cod_usuario = :valor;";
        $strExec = $this->conex->prepare($sql);
        $strExec->bindParam(':valor', $valor, PDO::PARAM_INT); #sentencia preparada... ?
        $resul=$strExec->execute();
        $datos=$strExec->fetchAll(PDO::FETCH_ASSOC);
        if($resul){
            return $datos;
        }else{
            return [];
        }
    
    }
}