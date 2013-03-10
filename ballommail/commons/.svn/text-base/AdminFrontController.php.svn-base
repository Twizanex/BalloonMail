<?php

include ('../../controller/AdministradorEstadisticasController.php');
include('../../controller/AdministradorAdminUsuariosController.php');
include('../../controller/AdministradorAdminCorrientesController.php');
include ('../../commons/Config.php');
include ('../../controller/PanelController.php');

class AdminFrontController {



private static function invokeAction($action, $controller){		
 		$actionName=$action;
 		$controllerName=$controller;

 		$config= Config::singleton();

 		//TODO UserFrontController es utilizado desde contenidoIndex.php (página principal del perfil
 		//usuario) se debería hacer una función, que tome el directorio desde donde es invocado,
 		//y se obtenga el path correspondiente al directorio donde se encuentran las vistas,
 		//el directorio view se debe establecer en la configuración.

		//$config->set('controllersFolder', '../../controller/');
		$config->set('viewsFolder', '../../view/admin/');
		//$config->set('modelsFolder', '../../model/');

		//Formamos el nombre del Controlador o en su defecto, tomamos que es el IndexController
		if(!isset($controllerName)){
		      $controllerName = 'IndexController';
		}
		else
			 $controllerName = $controllerName.'Controller';
			 
			 
	    //echo "Controlador:".$controllerName;
	    		 
		if(!isset($actionName)) {
			  $actionName = "contenidoIndexAdmin";
		}

		//Si no existe la clase que buscamos y su accion, tiramos un error 404
		if (is_callable(array($controllerName, $actionName)) == false)
		{
			//echo "Cadena:".$controllerName." ".$actionName;
			trigger_error ($controllerName . '->' . $actionName . ' no existe', E_USER_NOTICE);
			return false;
		}
		//Si todo esta bien, creamos una instancia del controlador y llamamos a la accion

		$controller = new $controllerName();
		$controller->$actionName();

 	}




public static function invoke($action, $controller, $panel, $menuOption) {

	/*
		echo "entro Invoke";
		echo "<br />";
		echo "Action: ".$action;
		echo "<br />";
		echo "Controller: ".$controller;
		echo "<br />";
		echo "Panel: ".$panel;
		echo "<br />";
		echo "MenuOption: ".$menuOption;
		echo "<br />";
*/
		//echo $action;
	    //echo $controller;
		//$controller= new AdministradorEstadisticasController();
		
		//Cargar el panel izquierdo de la sección de Estadisticas
		if (($controller=="AdministradorEstadisticas") && ($panel == 1))
		{
				AdminFrontController::invokeAction("panelEstadisticas","Panel");
		}
				
		//Cargar el panel izquierdo de la sección de Usuarios
		if (($controller=="AdministradorAdminUsuarios") && ($panel == 1))
		{
				AdminFrontController::invokeAction("panelUsuarios","Panel");
		}
		
		//Cargar el panel izquierdo de la sección de Corrientes
		if (($controller=="AdministradorAdminCorrientes") && ($panel == 1))
		{
				AdminFrontController::invokeAction("panelCorrientes","Panel");
		}
		
		//Menu Estadisticas				
		if (($menuOption=="estadistica-conexionesUsuarios") && ($panel == 0)) 
		{			
				AdminFrontController::invokeAction($action,$controller);
		}	
		
		if (($menuOption=="estadistica-espacioMemoriaUsuarios") && ($panel == 0))
		{
				AdminFrontController::invokeAction($action,$controller);
		}
		
		if (($menuOption=="estadistica-cantMensajesXCorrientes") && ($panel == 0))
		{
				AdminFrontController::invokeAction($action,$controller);
		}
		
		if (($menuOption=="estadistica-cantUsuariosXPais") && ($panel == 0))
		{
				AdminFrontController::invokeAction($action,$controller);
		}
		
		//Menu Usuarios - Listado de Usuarios
		if (($menuOption=="usuarios-listadoUsuarios") && ($panel == 0))
		{
				AdminFrontController::invokeAction($action,$controller);
		}
		
		//Menu Usuarios - Listado de Sugerencias
		if (($menuOption=="usuarios-sugerenciasCorrientes") && ($panel == 0))
		{
				AdminFrontController::invokeAction($action,$controller);
		}
		
		//Menu Usuarios - Form de Advertencia
		if (($menuOption=="usuarios-advertencia-form") && ($panel == 0))
		{
				AdminFrontController::invokeAction($action,$controller);
		}

		//Menu Usuarios - Envio de Form de Advertencia
		if (($menuOption=="usuarios-envio-advertencia-form") && ($panel == 0))
		{
				AdminFrontController::invokeAction($action,$controller);
		}
		
		//Menu Usuarios - Bloqueo de Usuario
		if (($menuOption=="usuarios-bloqueoUsuario") && ($panel == 0))
		{
				AdminFrontController::invokeAction($action,$controller);
		}
		
		//Menu Corrientes - Principal Listado
		if (($menuOption=="corrientes-listadoCorrientes") && ($panel == 0))
		{
				AdminFrontController::invokeAction($action,$controller);
		}
		
		//Menu Corrientes - Eliminar Corriente
		if (($menuOption=="corrientes-eliminarCorriente") && ($panel == 0))
		{
				AdminFrontController::invokeAction($action,$controller);
		}
		
		//Menu Corrientes - Agregar Corriente - Form
		if (($menuOption=="corrientes-FormModificarCorrientes") && ($panel == 0))
		{
				AdminFrontController::invokeAction($action,$controller);
		}
		
		//Menu Corrientes - Agregar/Modificar Corriente - Accion
		if (($menuOption=="corrientes-AltaModificarCorriente") && ($panel == 0))
		{
				AdminFrontController::invokeAction($action,$controller);
		}
		
		
		
		
}

}


?>
