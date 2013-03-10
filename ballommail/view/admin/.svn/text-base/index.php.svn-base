<?php
error_reporting(E_ALL && ~(E_NOTICE & E_WARNING));
include ('../../commons/Session.php');
include ('../../model/AdministradorUsuarios.php');
include ('../../model/AdministradorIdiomas.php');
include ('../../commons/EntityDAO.php');



		$usuario=$_REQUEST["usuario"];
		$password=$_REQUEST["passwd"];
		$usuarioAdmin = new AdministradorUsuarios();
		
		$usuarioValido= $usuarioAdmin->validoAdministrador($usuario, $password);

		
		if ($usuarioValido) {						
			$usuarioAdmin->loginAdministrador($usuarioValido);
			//header ('Location: ../admin/contenidoIndexAdmin.php');		
			//header ('Location: ../admin/contenidoIndexAdmin.php?menuOption=estadistica-conexionesUsuarios&contenido=getUsuariosConexiones&controller=AdministradorEstadisticas');
			header ('Location: ../admin/contenidoIndexAdmin.php?menuOption=estadistica-conexionesUsuarios&contenido=getUsuariosConexiones&controller=AdministradorEstadisticas');					 
		}	 		
		else 
		{			
			header ('Location: ../admin/login.php');
		}
?>