<?php
/* REMEMBER ME ->*/
if(isSet($cookie_name))
{
// Check if the cookie exists
if(isSet($_COOKIE[$cookie_name]))
	{
		parse_str($_COOKIE[$cookie_name]);

		// Make a verification
		$usuarioAdmin = new  AdministradorUsuarios();
		$usuarioValido= $usuarioAdmin->rememberMe($usr, $hash);

		if ($usuarioValido != null) {
			$usuarioAdmin->login($usuarioValido);
			if ($usuarioAdmin->tienePerfil($usuario, "usuario")){
				//include_once ('view/usuario/contenidoIndex.php');
				header('Location:view/usuario/contenidoIndex.php');
			}
			elseif ($usuarioAdmin->tienePerfil($usuario, "admin"))
				include_once ('../admin/index.php');
		}


	}
}
/*<- REMEMBER ME */
?>