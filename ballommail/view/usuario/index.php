<?php
		error_reporting(E_ALL && ~(E_NOTICE & E_WARNING));

/*		require_once ('../../settings.php'); */
		require_once ('autoload.php');
		$usuario=$_REQUEST["email"];
		$password=$_REQUEST["password"];

require_once ('../../settingsCookie.php');/*Autologin remember me*/

		$usuarioAdmin = new AdministradorUsuarios();

		/*REMEMBER ME ->*/
		$post_autologin = $_POST['autologin'];
		if($post_autologin == 1)
		{
			$password_hash = md5($password); // will result in a 32 characters hash
	setcookie ($cookie_name, 'usr='.$usuario.'&hash='.$password_hash, time() + $cookie_time,'/');
		}
		/*<-REMEMBER ME*/

		$usuarioValido= $usuarioAdmin->validoUsuario($usuario, $password);
		$bloqueado= $usuarioValido->bloqueado;
		if ($usuarioValido && !$bloqueado)
		{
			if ($usuarioAdmin->tienePerfil($usuario, "usuario")){
				$usuarioAdmin->login($usuarioValido);
				include_once ('contenidoIndex.php');
	 		}
	 		/* No se loguea mas el administrador por aca
	 		elseif ($usuarioAdmin->tienePerfil($usuario, "admin"))
	 			include_once ('../admin/index.php');*/
	 		else //Es Administrador
	 		header('location:../../index.php?controller=User&action=loginFail&idForm=1&bloqueado=0');
		}

		else if ($bloqueado){
			header('location:../../index.php?controller=User&action=loginFail&idForm=1&bloqueado=1');
		}
		else {
			header('location:../../index.php?controller=User&action=loginFail&idForm=1&bloqueado=0');
		}

?>