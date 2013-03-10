<?php

class FrontController {


public static function invokeAction($action, $controller){


 		$actionName=$action;
 		$controllerName=$controller;

 		$config= Config::singleton();

		$config->set('viewsFolder', 'view/');
		//$config->set('modelsFolder', 'model/');

		//Formamos el nombre del Controlador o en su defecto, tomamos que es el IndexController
		if(!isset($controllerName)){
		      $controllerName = 'IndexController';
		}
		else
			 $controllerName = $controllerName.'Controller';
		if(!isset($actionName)) {
			  $actionName = "index";
		}

		//Si no existe la clase que buscamos y su accion, tiramos un error 404
		if (is_callable(array($controllerName, $actionName)) == false)
		{
			trigger_error ($controllerName . '->' . $actionName . ' no existe', E_USER_NOTICE);
			return false;
		}
		//Si todo esta bien, creamos una instancia del controlador y llamamos a la accion

		$controller = new $controllerName();
		$controller->$actionName();


 	}


}

?>

