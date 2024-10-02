<?php
#Requerimos los modelos
require_once 'modelo/usuario.php';

$objUsuario = new Usuario();

if(isset($_POST["ingresar"])){ 
#verificar si lo que se esta enviando cumple con la validacion
	if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["loginUser"]) &&
	preg_match('/^[a-zA-Z0-9]+$/', $_POST["loginPass"])){ 

		$user = "user"; #igualamos la variable user al user de la bd
		$valor = $_POST["loginUser"]; #igualamos la variable valor al user que se esta ingresando

        $respuesta = $objUsuario->login($user, $valor);

	}

	if (!empty($respuesta) && isset($respuesta["user"])) {
		// Verificamos la contraseña utilizando password_verify()
		if ($respuesta["user"] == $_POST["loginUser"] && password_verify($_POST["loginPass"], $respuesta["clave"])) {
			
			$_SESSION["iniciarsesion"] = "si";
			$_SESSION["user"] = $respuesta["user"];
			$_SESSION["nombre"] = $respuesta["nombre"];
			
			#Los accesos se inician en 0
			$_SESSION["admin"]=0;
			$_SESSION["usuario"]=0;
			$_SESSION["invitado"]=0;

			//Obtenemos los permisos asociados al usuario
			$accesos = $objUsuario->accesos($respuesta["cod_usuario"]);
			foreach($accesos as $cod_permiso){
				if ($cod_permiso["cod_permiso"] == 1) {
					$_SESSION["admin"] = 1;
				} else if ($cod_permiso["cod_permiso"] == 2) {
					$_SESSION["usuario"] = 1;
				} else if ($cod_permiso["cod_permiso"] == 3) {
					$_SESSION["invitado"] = 1;
				}
			}
		} else {
			$login = [
                'title'=>'Error',
                'message'=>'Error al ingresar.Intente nuevamente',
                'icon'=>'error'
            ];
		}
	} else {
		$login = [
            'title'=>'Error',
            'message'=>'Usuario no encontrado',
            'icon'=>'error'
        ];
	}
	
}
require_once 'vista/login.php';

