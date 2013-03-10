<?php
error_reporting(E_ALL && ~(E_NOTICE & E_WARNING));
require_once ('autoload.php');
require_once ('settings.php');
/*Veririficar si tengo cookie y actualizarla*/
require_once ('settingsCookie.php');
/*Si tengo sesion voy a la pagina inicial*/
if($_SESSION['usuario'])
{
	/*Importante no dejar en ningun archivo anterior ninguna linea en blanco antes del < ? php */
	header("Location: view/usuario/contenidoIndex.php?menuOption=hill");
	exit;
}

require_once ('commons/languages.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ballon mail</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <link href="css/globo.css" rel="stylesheet" type="text/css" />
	<!-- include the Tools -->
<link rel="stylesheet" type="text/css" href="css/scrollable-navigator.css"/>
<link rel="stylesheet" type="text/css" href="css/scrollable-horizontal.css"/>
<link rel="stylesheet" type="text/css" href="css/scrollable-buttons.css"/>


<script src="http://cdn.jquerytools.org/1.2.5/full/jquery.tools.min.js"></script>


</head>
<body>
<div id="paisaje">
  <div id="cabecera">
    <?php //include_once 'view/login-form.php';

     	RegistroFrontController::invoke($action, $controller, "login", $_REQUEST['idForm']);

     ?>

    <img src="imagenes/logobaloon.png" width="302" height="157" />
    <div id="contenido">
      <div id="col_lat_log">
        <p><span class="resaltado"><?php echo ballom_echo("mainPageLine1"); ?></span><br />
          <?php echo ballom_echo("mainPageLine2"); ?> </p>
        <p><span class="resaltado"><?php echo ballom_echo("mainPageLine3"); ?></span> <?php echo ballom_echo("mainPageLine4"); ?></p>
        <p><span class="resaltado"><?php echo ballom_echo("mainPageLine5"); ?></span> <?php echo ballom_echo("mainPageLine6"); ?></p>
        <p><span class="resaltado"><?php echo ballom_echo("mainPageLine7"); ?></span> <?php echo ballom_echo("mainPageLine8"); ?></p>
        <p><span class="resaltado"><em><?php echo ballom_echo("mainPageLine9"); ?></em></span><br />
        </p>
      </div>
      <?php

	  	RegistroFrontController::invoke($action, $controller, "registro", $_REQUEST['idForm']);




     ?>
    </div>
  </div>
</div>
<div id="pieback">
  <div id="pie"><a href="index.php?country_code=es">Español</a> <a href="index.php?country_code=en">English</a></div>
</div>
</body>
</html>
