<?php
session_start();

require_once 'modelo/usuario.php';
$objUsuario = new Usuario();

if(isset($_POST["ingresar"])){ 
#verificar si lo que se esta enviando cumple con la validacion
	if(!empty($_POST["loginUser"]) && !empty($_POST["loginPass"])){ 

		$user = "user"; #igualamos la variable user al user de la bd
		$valor = $_POST["loginUser"]; #igualamos la variable valor al user que se esta ingresando

        $respuesta = $objUsuario->login($user, $valor);
		#var_dump($respuesta);
	}

	if (!empty($respuesta) && isset($respuesta["user"])) {
		
		if ($respuesta["user"] == $_POST["loginUser"] && $_POST["loginPass"] == $respuesta["clave"]) {
			
			
			#$_SESSION["iniciarsesion"] = "si";
			$_SESSION["user"] = $respuesta["user"];
			$_SESSION["nombre"] = $respuesta["nombre"];
			
			#Los accesos se inician en 0
			$_SESSION["admin"]=0;
			$_SESSION["usuario"]=0;
			$_SESSION["invitado"]=0;

			//Obtenemos los permisos asociados al usuario
			$accesos = $objUsuario->accesos($respuesta["cod_usuario"]);
			foreach($accesos as $cod_perfil){
				if ($cod_perfil["cod_perfil"] == 1) {
					$_SESSION["admin"] = 1;
				} else if ($cod_perfil["cod_perfil"] == 2) {
					$_SESSION["usuario"] = 1;
				} else if ($cod_perfil["cod_perfil"] == 3) {
					$_SESSION["invitado"] = 1;
				}
			}
				header('?pagina=inicio');
				exit();
				#require_once 'vista/inicio.php';
			}
			
		} else {
			require_once 'vista/login.php';
		}
	} else {

		require_once 'vista/login.php';
		/*"<script>
                    alert('Error');
                    window.location = '?pagina=login'
                </script>";
		$ingresar = [
            'title'=>'Error',
            'message'=>'Usuario no encontrado',
            'icon'=>'error'
        ];*/
	}

	


