<?php
require_once ('autoload.php');

/*Destroy cookie antes de ejecutar otra accion*/	
require_once ('settingsCookie.php');
if(isSet($_COOKIE[$cookie_name]) )
{
	//unset($_SESSION['username']);
	// remove 'site_auth' cookie
	setcookie ($cookie_name, "", time() - 3600, "/~view/");
	setcookie ($cookie_name, "", time() - 3600, "/");
	setcookie ($cookie_name, '', time() - 3600);
}

/*Destruir la sesion*/
$session=Session::getInstance();
$session->destroy();

/*Volver a empezar*/
include_once 'index.php';
?>