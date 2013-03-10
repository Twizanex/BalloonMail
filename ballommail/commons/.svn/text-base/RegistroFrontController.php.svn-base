<?php

class RegistroFrontController {


public static function invoke($action, $controller, $section, $idForm ){

	if ($section=="login") {
		if ($idForm=='1') {
	     	FrontController::invokeAction($_GET['action'], $_GET['controller']);
		}
		else
			FrontController::invokeAction("loginForm", "User");
	}
	else if ($section=="registro") {

		if ($_REQUEST['idForm'] =="2") {
	     	FrontController::invokeAction($_GET['action'], $_GET['controller']);
		}
		else
			FrontController::invokeAction("registroForm", "User");

	}


}

}
?>

