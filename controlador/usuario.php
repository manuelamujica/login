<?php

require_once 'modelo/usuario.php';
$obj = new Usuario();

$perfil = $obj->perfiles(); // Obtener los perfiles para pasarlos a la vista


if(isset($_POST['registrar'])){

    if(!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['user']) && !empty($_POST['correo']) && !empty($_POST['pass']) && !empty($_POST['perfil'])){
        
        $obj->setNombre($_POST["nombre"]);
        $obj->setApellido($_POST["apellido"]);
        $obj->setUsuario($_POST["user"]);
        $obj->setClave($_POST["pass"]);
        $obj->setCorreo($_POST["correo"]);
        
        $perfil = $_POST["perfil"];
        $result = $obj->registrar($perfil);

    if($result == 1){
            echo "<script>
            alert('Registrado con exito');
            location = 'usuarios' </script>";
    }else{
            echo "<script>
            alert('No se pudo completar el registro');
            location = 'usuarios' </script>";
        }
    }
}
require_once 'vista/usuario.php';
