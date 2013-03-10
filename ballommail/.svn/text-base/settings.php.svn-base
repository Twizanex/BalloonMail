<?php

Config::singleton()->set('db_host', 'localhost');
Config::singleton()->set('db_user', 'mburiano_bm');
Config::singleton()->set('db_pass', 'bm');
Config::singleton()->set('db_name', 'mburiano_balloonmail');

Config::singleton()->set('entradasPorPaginaBitacora', '7');
Config::singleton()->set('entradasPorPagina', '7');
Config::singleton()->set('mayoriaEdad', '13');

Config::singleton()->set('cuentaDeCorreo', 'mburiano@globalscope.com.ar'); /*Por ejemplo para recordar password en UserController*/

Config::singleton()->set('mensajesPorSlideMax', '6');
Config::singleton()->set('mensajesPorSlideInterval', '5');

Config::singleton()->set('mensajesPorSlideMax', '6');

Config::singleton()->set('registroEdadMinima', '13');

if (isset($_REQUEST['menuOption'])) {
	//echo "menuOption=".$_REQUEST['menuOption'];
	Session::getInstance()->__set('menuOption',$_REQUEST['menuOption']);
}

$countryCode=$_REQUEST['country_code'];

if (isset($countryCode)) {
	Session::getInstance()->__set('language',$countryCode);
	$usuarioAdmin= new AdministradorUsuarios();
	$usuarioAdmin->cambiarIdioma(Session::getInstance()->userId, $countryCode);

}
else if (!isset(Session::getInstance()->language)){
	Session::getInstance()->__set('language',"en");

}


?>